<?php

declare(strict_types=1);

namespace App\Controller;


use Cake\Mailer\Mailer;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Mailer\TransportFactory;




class UsersController extends AppController
{

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('คุณกรอกรหัสผ่านไม่ถูกต้อง');
            }
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    public function register()
    {
        if ($this->request->is('post')) {
            $usertable = TableRegistry::getTableLocator()->get('users');
            $user = $usertable->newemptyEntity();
            $hasher = new DefaultPasswordHasher();
            $myname = $this->request->getData('name');
            $myemail = $this->request->getData('email');
            $mypass = $this->request->getData('password');
            $mytoken = Security::hash(Security::randomBytes(32));
            $user->name = $myname;
            $user->email = $myemail;
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
                
                //for test
                // TransportFactory::setConfig('mailtrap', [
                //     'host' => 'smtp.mailtrap.io',
                //     'port' => 2525,
                //     'username' => '0e15d3483c9ad5',
                //     'password' => '6b97794bb75743',
                //     'className' => 'Smtp'
                // ]);

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
            } else {
                $this->Flash->set('ลงทะเบียนไม่สำเร็จ', ['element' => 'error']);
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
