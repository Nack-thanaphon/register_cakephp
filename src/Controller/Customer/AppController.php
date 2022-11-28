<?php

namespace App\Controller\Customer;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Custom');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
    }
    // in src/Controller/AppController.php
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions([]);
        $this->viewBuilder()->setLayout('customer');

        $result = $this->Authentication->getResult()->getData();
        if (!empty($result)) {
            if ($result['user_role_id'] == 2) {
                $uid = $result['id'];
                $userData =  $this->Custom->GetUserData($uid);
                $this->set('userData', $userData);
            } else {
                return $this->redirect([
                    'prefix' => false,
                    'controller' => 'users',
                    'action' => 'login',
                ]);
            }
        }
    }

    public function GetUserDataSesion()
    {
        $session = $this->request->getSession();
        $Userdata =  $session->read('userlogin');
        return $Userdata;
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
