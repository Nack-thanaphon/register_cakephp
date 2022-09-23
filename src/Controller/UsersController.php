<?php

declare(strict_types=1);

namespace App\Controller;


use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;




class UsersController extends AppController
{
    public function register()
    {
        if ($this->request->is('post')) {
            $usertable = TableRegistry::getTableLocator()->get('users');
            $user = $usertable->newemptyEntity();
            $hasher = new DefaultPasswordHasher();
            $myname = $this->request->getData('name');
            $myemail = $this->request->getData('email');
            $mypass = Security::hash($this->request->getData('password'), 'sha256', false);
            $mytoken = Security::hash(Security::randomBytes(32));
            $user->name = $myname;
            // $user->email = $myemail;
            // $user->password = $hasher->hash($mypass);
            // $user->token = $mytoken;
            // $user->created_at = date('Y-m-d H:i:s');
            // $user->updated_at = date('Y-m-d H:i:s');

            if ($usertable->save($user)) {
                $this->Flash->set('ลงทะเบียนเรียบร้อย', ['element' => 'success']);
                // Email::configTransport('mailtrap', [
                //     'host' => 'smtp.mailtrap.io',
                //     'port' => 2525,
                //     'username' => '5e5c495f64998a',
                //     'password' => '008a9d71482220',
                //     'className' => 'Smtp'
                // ]);

                // $email = new Email('default');
                // $email->setTransport('mailtrap');
                // $email->emailFormat('html');
                // $email->from('Dogapi@gmail.com', 'Puppy Dogie API');
                // $email->subject('กรุณายืนยันอีเมลล์ของคุณเพื่อเข้าใช้งาน Dog API');
                // $email->to($myemail);
                // $email->send('สวัสดีครับ' . $myname . '<br/> กรุณายืนยันอีเมลล์ยืนยันของคุณด้านล่างนี<br/> <a href="http://localhost:8765/users/verification/' . $mytoken . '">Verification Email</a> <br/> ขอบพระคุณที่เข้าร่วมทีมกับเรา');
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
