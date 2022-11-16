<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\Locator\TableLocator;
use Cake\ORM\TableRegistry;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
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
                    'd.cover =' => 1
                ])
                ->group('id,title,image')
        );


        $this->set(compact('posts'));
    }

    public function view($id = null)
    {
        $posttable = TableRegistry::getTableLocator()->get('Posts');

        if ($this->request->is('post')) {
            $id = $this->request->getData('p_id');

            $posts = $posttable->find()
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
                    'posts.id =' => $id,
                ])
                ->group('id,title,image');

            $this->set(['posts' => $posts]);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $PostTypeTable = TableRegistry::getTableLocator()->get('Poststype');
        $PostsTable = TableRegistry::getTableLocator()->get('Posts');
        $ImageTable = TableRegistry::getTableLocator()->get('Image');

        $PostsData = $PostsTable->newEmptyEntity();
        $PostsType =  $PostTypeTable->find('all');
        $this->set(compact('PostsType'));
        $session = $this->request->getSession();
        $Userid =  $session->read('userlogin.id');

        if ($this->request->is("post")) {
            $data = $this->request->getData();

            $PostsData = $PostsTable->patchEntity($PostsData, array(
                "p_title" => $this->request->getData('p_title'),
                "p_type_id" => $this->request->getData('p_type_id'),
                "p_detail" => $this->request->getData('p_detail'),
                "p_user_id" => $Userid,
                "p_date" => $this->request->getData('p_date'),
                "p_status" => $this->request->getData('p_status'),
                "p_views" => 0,
            ));
            $imageid = 0;
            if ($PostsTable->save($PostsData)) {
                $Postid = $PostsData->id;
                $postsImage = $this->request->getData("p_image_id");
                if (count($postsImage)) {
                    foreach ($postsImage as $key => $imageFile) {
                        $fileName = $postsImage[$key]->getClientFilename();
                        $fileType = $postsImage[$key]->getClientMediaType();
                        if ($fileType == "image/webp" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                            $imagePath = WWW_ROOT . "img/" . DS . $fileName;
                            $postsImage[$key]->moveTo($imagePath);
                            $data["name"] = "img/" . $fileName;
                            $imageData = $ImageTable->newEmptyEntity();
                            $imageData = $ImageTable->patchEntity($imageData, array(
                                "post_id" => $Postid,
                                "name" => $data["name"],
                                "cover" => 0,
                                "status" => 1,
                            ));
                        }
                        $ImageTable->save($imageData);
                        if($imageid == 0) {
                            $imageid = $imageData->id;
                        }


                        // $this->redirect(
                        //     array(
                        //         "controller" => "posts",
                        //         'action' => 'postcover', $Postid,
                        //     ),
                        // );

                    }
                   
                    $this->Flash->success(__('บันทึกเรียบร้อย'));
                    return $this->redirect(['controller' => 'posts', 'action' => 'index']);
                }
            } else {
                $this->Flash->error(__('ไม่สามารถบันทึกได้'));
            };
        }
        $this->set('PostsData', $PostsData);
    }


    // public function postcover($id = null)
    // {
    //     $ImageTable = TableRegistry::getTableLocator()->get('Image');
    //     $imageData = $ImageTable->newEmptyEntity();
    //     if (!empty($this->request->is("post"))) {
    //         $idCover = $this->request->getData('pid');
    //         $imageData->id =  $idCover;
    //         $imageData->cover = 1;
    //         if ($ImageTable->save($imageData)) {
    //             return $this->redirect(['action' => 'index']);
    //             echo 'OK';
    //         }
    //     }
    //     if (!empty($id)) {

    //         $coverimage = $ImageTable->find()
    //             ->select([
    //                 'id' => 'image.id',
    //                 'postid' => 'image.post_id',
    //                 'image' => 'image.name',
    //             ])
    //             ->from([
    //                 'image'
    //             ])
    //             ->where([
    //                 'image.post_id =' => $id
    //             ])
    //             ->group('id,postid,image')
    //             ->toArray();
    //         $this->set(compact('coverimage'));
    //     }
    // }

    public function edit($id = null)
    {
        $PostTypeTable = TableRegistry::getTableLocator()->get('PostsType');
        $ImageTable = TableRegistry::getTableLocator()->get('Image');
        $coverimage = $ImageTable->find()
            ->select([
                'id' => 'image.id',
                'postid' => 'image.post_id',
                'image' => 'image.name',
            ])
            ->from([
                'image'
            ])
            ->where([
                'image.post_id =' => $id
            ])
            ->group('id,postid,image')
            ->toArray();
        $this->set(compact('coverimage'));

        $PostsType =  $PostTypeTable->find('all');
        $this->set(compact('PostsType'));


        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    public function delete()
    {
        if ($this->request->is("post")) {
            $id = $this->request->getData('id');
            $PostData = $this->Posts->get($id);
            if ($this->Posts->delete($PostData)) {
                $this->Flash->success(__('The post has been deleted.'));
                return $this->redirect(['controller' => 'posts', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be deleted. Please, try again.'));
            }
            return $this->redirect(['controller' => 'posts', 'action' => 'index']);
        }
    }
}
