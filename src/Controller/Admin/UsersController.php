<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Mailer\Mailer;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Mailer\TransportFactory;
use Cake\ORM\Locator\TableLocator;


class UsersController extends AppController
{

    public function index()
    {
        $users = $this->Users->find()
            ->contain(['UsersType', 'UsersRole'])
            ->order(['Users.id DESC'])
            ->toArray();



        $usersUnVerifiled = $this->Users->find('all', [
            'contain' => ['UsersType', 'UsersRole'],
        ])->where([
            'verified =' => 0
        ])->order([
            'Users.id' => 'DESC'
        ])->limit(5)->toArray();



        $this->set(compact('usersUnVerifiled', 'users'));
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }


    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function login()
    {

        $session = $this->request->getSession();
        $data =  $session->read('userlogin.email');
        if (!empty($data)) {
            return $this->redirect($this->Auth->redirectUrl([
                'Prefix' => 'Admin',
                'controller' => 'dashboard',
                'action' => 'index'
            ]));
        } else {
            // return $this->redirect([
            //     'Prefix' => 'Admin',
            //     'controller' => 'users',
            //     'action' => 'login'
            // ]);
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $session->write('userlogin', $user);
                return $this->redirect($this->Auth->redirectUrl([
                    'Prefix' => 'Admin',
                    'controller' => 'dashboard',
                    'action' => 'index'
                ]));
            } else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
        }
        $this->viewBuilder()->setlayout('frontend');
    }


    public function logout()
    {
        $session = $this->request->getSession();
        $session->delete('userlogin.email');
        return $this->redirect($this->Auth->logout());
    }
    public function register()
    {

        $this->viewBuilder()->setlayout('frontend');

        if ($this->request->is('post')) {
            $usertable = TableRegistry::getTableLocator()->get('users');
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
            $user->user_role_id = 1;
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
                $mailer->setFrom(['e21bvz@gmail.com' => 'DOG-API |TEAM'])
                    ->setTo($myemail)
                    ->setEmailFormat('html')
                    ->setSubject('กรุณายืนยันอีเมลล์ของคุณเพื่อเข้าใช้งาน Dog API')
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
            $usertable = TableRegistry::getTableLocator()->get('users');
            $user = $usertable->find('all')->where(['email' => $email])->first();

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
                $mailer->setFrom(['e21bvz@gmail.com' => 'DOG-API |TEAM'])
                    ->setTo($email)
                    ->setEmailFormat('html')
                    ->setSubject('เปลี่ยนรหัสผ่านการเข้าใช้งาน Dog API')
                    ->setTransport('gmail')
                    ->setViewVars([
                        'name' => $user->name,
                        'verify' => $token
                    ])
                    ->viewBuilder()
                    ->setTemplate('resetpassword');

                $mailer->deliver();
            } else {
                $this->Flash->set('เปลี่ยนรหัสผ่านไม่สำเร็จ หรือข้อมูลไม่ถูกต้อง', ['element' => 'error']);
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
            $usertable = TableRegistry::getTableLocator()->get('users');
            $user = $usertable->find('all')->where(['token' => $token])->first();
            $user->password = $pass;
            if ($usertable->save($user)) {
                return $this->redirect(['action' => 'login']);
            }
        }
    }

    public function verification($token)
    {
        $usertable = TableRegistry::getTableLocator()->get('users');
        $verify = $usertable->find('all')->where(['token' => $token])->first();
        $verify->verified = '1';
        $usertable->save($verify);
    }
}
