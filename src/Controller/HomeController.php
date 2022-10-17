<?php

namespace App\Controller;

use Cake\ORM\Locator\TableLocator;
use Cake\ORM\TableRegistry;

class HomeController extends AppController
{

    public function index()
    {

        $table = TableRegistry::getTableLocator()->get('posts');
        $this->loadModel('poststype');
        $this->loadModel('users');
        $post = $table->find('all', array(
            'contain' => ['poststype', 'users'],
            'limit' => 3,
            'order' => 'posts.id DESC',
        ));

        $this->set('posts', $post);
    }
}
