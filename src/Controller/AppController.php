<?php

namespace App\Controller;

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
        $email = null;
        $this->set('email', $email);
    }

    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('default');
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
