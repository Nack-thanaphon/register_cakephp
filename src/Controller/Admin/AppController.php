<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Controller\Component\FlashComponent;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Custom');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'scope' => ['verified' => '1'],
                    'userModel' => 'Users'
                ]
            ],
            'loginredirect' => [
                'Prefix' => 'Admin',
                'controller' => 'dashboard',
                'action' => 'index'
            ],
            'logoutredirect' => [
                'Prefix' => 'Admin',
                'controller' => 'users',
                'action' => 'login'
            ],
            'storage' => 'Session',
            'unauthorizedRedirect' => $this->referer()
        ]);

        // public function GetUserData($id)
        $uid = $this->Auth->user('id');
        $userData =  $this->Custom->GetUserData($uid);
        $this->set('userData', $userData);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['register', 'resetpassword', 'forgetpassword']);
        $this->viewBuilder()->setLayout('dashboard');
    }
    public function sendLineNotify($message = "แจ้งเตือนรายการสั่งซื้อ")
    {
        $token = "7wJZPRrVxxw5bv0pw0EJspO8wQ6TYpF5Lhflftfsd7S"; // ใส่ Token ที่สร้างไว้

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "message=" . $message);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $token . '',);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);

        // if (curl_error($ch)) {
        //     echo 'error:' . curl_error($ch);
        // } else {
        //     $res = json_decode($result, true);
        //     echo "status : " . $res['status'];
        //     echo "message : " . $res['message'];
        // }
        // curl_close($ch);
    }
}
