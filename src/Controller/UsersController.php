<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Mailer\TransportFactory;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Router;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login()
    {
        $orderTable = TableRegistry::getTableLocator()->get('Orders');
        $session = $this->request->getSession();
        $userloginsession =  $session->read('userlogin');
        $cartTokensession =  $session->read('cartToken');
        $result = $this->Authentication->getResult();
        $userAuthentication = $result->getData();

        // pr($result);
        // pr($userAuthentication);die;
        if (!empty($userloginsession && $result->isValid())) {
            if ($userAuthentication['user_role_id'] == 1) {
                return $this->redirect([
                    'prefix' => 'Admin',
                    'controller' => 'dashboard',
                    'action' => 'index',
                ]);
            }
            if ($userAuthentication['user_role_id'] == 2) {
                return $this->redirect([
                    'prefix' => 'Customer',
                    'controller' => 'dashboard',
                    'action' => 'index',
                ]);
            }
        }

        if ($this->request->is('post')) {
            $CartStorageToken = $this->request->getData('cart_storage');
            if (!empty($userAuthentication['id'])) {
                if ($result && $result->isValid()) {
                    if (($userAuthentication['verified'] == 1)) {
                        if ($userAuthentication['user_role_id'] == 1) {
                            $session->write('userlogin', $userAuthentication);
                            return $this->redirect([
                                'prefix' => 'Admin',
                                'controller' => 'dashboard',
                                'action' => 'index',
                            ]);
                        }
                        if ($userAuthentication['user_role_id'] == 2) {
                            if (!empty($CartStorageToken)) {
                                $session->write('userlogin', $userAuthentication);
                                $session->write('cartToken', $CartStorageToken);
                                $cartData = $orderTable->newEmptyEntity();
                                $CartDataByToken = $orderTable->find()
                                    ->where(['orders_token' => $CartStorageToken])
                                    ->first();
                                $userId = $userAuthentication['id'];
                                $cartData->id = $CartDataByToken->id;

                                $cartData = $orderTable->patchEntity($cartData, array(
                                    "orders_user_id" => $userId,
                                    "orders_token" => $CartStorageToken,
                                ));
                                if ($orderTable->save($cartData)) {
                                    return $this->redirect([
                                        'prefix' => 'Customer',
                                        'controller' => 'dashboard',
                                        'action' => 'payment',
                                        $CartStorageToken
                                    ]);
                                }
                            }
                            return $this->redirect([
                                'prefix' => 'Customer',
                                'controller' => 'dashboard',
                                'action' => 'index',
                            ]);
                        }
                    } else {
                        $this->Authentication->logout();
                        $this->Flash->error(__('กรุณายืนยันอีเมลล์เพื่อเข้าสู่ระบบ'));
                    }
                } else {
                    $this->Authentication->logout();
                    $this->Flash->error(__('Username or password is incorrect'));
                }
            } else {
                $this->Authentication->logout();
                $this->Flash->error(__('กรุณาเข้าสู่ระบบ หรือ สมัครสมาชิก !!'));
            }
        }
        $this->viewBuilder()->setlayout('frontend');
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        $session = $this->request->getSession();

        if ($result && $result->isValid()) {
            $session->delete('userlogin');
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    public function register()
    {

        $this->viewBuilder()->setlayout('frontend');

        if ($this->request->is('post')) {
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $user = $usertable->newemptyEntity();
            $hasher = new DefaultPasswordHasher();
            $myname = $this->request->getData('name');
            $myemail = $this->request->getData('email');
            $adminside = $this->request->getData('adminside');


            $mypass = $this->request->getData('password');
            $mytoken = Security::hash(Security::randomBytes(32));
            $user->name = $myname;
            $user->email = $myemail;
            $user->user_type_id = 1;
            $user->user_role_id = 2;
            $user->status = 1;
            $user->verified = 0;
            $user->password = $hasher->hash($mypass);
            $user->token = $mytoken;
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');

            if ($usertable->save($user)) {
                $this->Flash->set('ลงทะเบียนเรียบร้อย', ['element' => 'success']);
                TransportFactory::setConfig('gmail', [
                    'host' => 'smtp.gmail.com',
                    'port' => 587,
                    'username' => 'e21bvz@gmail.com',
                    'password' => 'jxcsblueiiwjzvxd',
                    'className' => 'Smtp',
                    'tls' => true
                ]);

                $mailer = new Mailer('default');
                $mailer->setFrom(['e21bvz@gmail.com' => 'แม่ปลูกลูกขาย'])
                    ->setTo($myemail)
                    ->setEmailFormat('html')
                    ->setSubject('กรุณายืนยันอีเมลล์ของคุณเพื่อเข้าใช้งาน แม่ปลูกลูกขาย')
                    ->setTransport('gmail')
                    ->setViewVars([
                        'name' => $myname,
                        'verify' => $mytoken
                    ])
                    ->viewBuilder()
                    ->setTemplate('default');
                $mailer->deliver();
                if ($adminside == 'qwewebdbdfgbfgbdfngjndr') {
                    return $this->redirect(['action' => 'index']);
                } else {
                    return $this->redirect(['action' => 'login']);
                }
            } else {
                $this->Flash->set('ลงทะเบียนไม่สำเร็จ', ['element' => 'error']);
            }
        }
    }
    public function forgetpassword()
    {

        $this->viewBuilder()->setlayout('frontend');

        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $token = Security::hash(Security::randomBytes(25));
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $user = $usertable->find('all')->where(['email' => $email])->first();
            if ($user != null) {
                $user->password = '';
                $user->token = $token;

                if ($usertable->save($user)) {
                    $this->Flash->set('กรุณาเช็คในอีเมลล์ ' . $email . ' เพื่อยืนยันการเปลี่ยนรหัสผ่าน', ['element' => 'success']);
                    TransportFactory::setConfig('gmail', [
                        'host' => 'smtp.gmail.com',
                        'port' => 587,
                        'username' => 'e21bvz@gmail.com',
                        'password' => 'jxcsblueiiwjzvxd',
                        'className' => 'Smtp',
                        'tls' => true
                    ]);

                    $mailer = new Mailer('default');
                    $mailer->setFrom(['e21bvz@gmail.com' => 'แม่ปลูกลูกขาย'])
                        ->setTo($email)
                        ->setEmailFormat('html')
                        ->setSubject('เปลี่ยนรหัสผ่านการเข้าใช้งาน แม่ปลูกลูกขาย')
                        ->setTransport('gmail')
                        ->setViewVars([
                            'name' => $user->name,
                            'verify' => $token
                        ])
                        ->viewBuilder()
                        ->setTemplate('resetpassword');

                    $mailer->deliver();
                    $htmlStatusCode = 200;
                    $response = [
                        'status' => $htmlStatusCode,
                        'message' => 'OK',
                    ];
                    $this->set(compact('response'));
                    $this->viewBuilder()->setOption('serialize', ['response']);
                    $this->setResponse($this->response->withStatus($htmlStatusCode));
                } else {
                    $this->Flash->set('เปลี่ยนรหัสผ่านไม่สำเร็จ หรือข้อมูลไม่ถูกต้อง', ['element' => 'error']);
                }
            } else {
                $this->Flash->set('ไม่มีข้อมูลในระบบ', ['element' => 'error']);
            }
        } else {
            $this->Flash->set('กรุณากรอกข้อมูลให้ถูกต้อง', ['element' => 'error']);
        }
    }

    public function resetpassword($token)
    {
        if ($this->request->is('post')) {
            $hasher = new DefaultPasswordHasher();
            $pass = $hasher->hash($this->request->getData('password'));
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $user = $usertable->find('all')->where(['token' => $token])->first();
            $user->password = $pass;
            if ($usertable->save($user)) {
                return $this->redirect(['action' => 'login']);
            }
        }
    }

    public function verification($token)
    {
        $usertable = TableRegistry::getTableLocator()->get('Users');
        $verify = $usertable->find('all')->where(['token' => $token])->first();
        $verify->verified = '1';
        $usertable->save($verify);
    }
}
