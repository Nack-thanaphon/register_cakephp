<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $posts = $this->paginate($this->Posts, [
            'contain' => ['poststype', 'users'],
        ]);

        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Posts id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $posts = $this->Posts->get($id, [
            'contain' => ['poststype', 'users'],
        ]);

        $this->set(compact('posts'));
    }
}
