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
        $posts = $this->paginate(
            $this->Posts->find()
                ->select([
                    'id' => 'posts.id',
                    'title' => 'posts.p_title',
                    'type' => 'p.pt_name',
                    'detail' => 'posts.p_detail',
                    'status' => 'posts.p_status',
                    'user' => 's.name',
                    'date' => 'posts.p_created_at',
                    'image' => 'd.name'
                ])
                ->from([
                    'posts'
                ])
                ->join([
                    'd' => [
                        'table' => 'image',
                        'type' => 'INNER',
                        'conditions' => 'd.post_id = posts.id',
                    ],
                    'p' => [
                        'table' => 'posts_type',
                        'type' => 'INNER',
                        'conditions' => 'p.pt_id = posts.p_type_id',
                    ],
                    's' => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => 's.id = posts.p_user_id',
                    ],
                ])
                ->where([
                    'd.cover =' => 1,
                    'posts.p_status =' => 1
                ])
                ->group('id,title,image')
        );

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
        $posts = $this->Posts->find()
            ->select([
                'id' => 'posts.id',
                'title' => 'posts.p_title',
                'type' => 'p.pt_name',
                'detail' => 'posts.p_detail',
                'status' => 'posts.p_status',
                'user' => 's.name',
                'date' => 'posts.p_created_at',
                'image' => 'd.name'
            ])
            ->from([
                'posts'
            ])
            ->join([
                'd' => [
                    'table' => 'image',
                    'type' => 'INNER',
                    'conditions' => 'd.post_id = posts.id',
                ],
                'p' => [
                    'table' => 'posts_type',
                    'type' => 'INNER',
                    'conditions' => 'p.pt_id = posts.p_type_id',
                ],
                's' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 's.id = posts.p_user_id',
                ],
            ])
            ->where([
                'd.cover =' => 1,
                'posts.id =' => $id

            ])
            ->group('id,title,image')
            ->toArray();

        $this->set(compact('posts'));
    }
}
