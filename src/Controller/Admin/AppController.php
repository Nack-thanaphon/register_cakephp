<?php

declare(strict_types=1);

namespace App\Controller\Admin;

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
                'form' => [
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'scope' => ['verified' => '1'],
                    'userModel' => 'Users'
                ]
            ],
            'loginRedirect' => [
                'Prefix' => 'Admin',
                'controller' => 'dashboard',
                'action' => 'index'
            ],
            'logoutRedirect' => [
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

        $this->loadModel('poststype');
        $this->loadModel('users');
        parent::beforeFilter($event);
        $this->Auth->allow('register', 'resetpassword', 'forgetpassword', 'index');
        $this->viewBuilder()->setLayout('dashboard');
    }
}
