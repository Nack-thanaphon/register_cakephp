<?php

namespace App\Controller;

use Cake\ORM\Locator\TableLocator;
use Cake\ORM\TableRegistry;

class HomeController extends AppController
{

    public function index()
    {

        $posttable = TableRegistry::getTableLocator()->get('Posts');
        $producttable = TableRegistry::getTableLocator()->get('Products');

        $post = $posttable->find()
            ->select([
                'id' => 'posts.id',
                'title' => 'posts.p_title',
                'type' => 'p.pt_name',
                'detail' => 'posts.p_detail',
                'status' => 'posts.p_status',
                'user' => 's.name',
                'date' => 'posts.p_date',
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

            ])->order([
                'posts.id' => 'DESC'
            ])->toArray();

        $BranchTable = TableRegistry::getTableLocator()->get('Branch');
        $Branch = $BranchTable->find()
            ->order(['id' => 'DESC'])
            ->limit(3)
            ->toArray();

        $productTable = TableRegistry::getTableLocator()->get('Products');
        $Products = $productTable->find()
            ->select([
                'id' => 'products.p_id',
                'title' => 'products.p_title',
                'detail' => 'products.p_detail',
                'type' => 'p.pt_name',
                'price' => 'products.p_price',
                'total' => 'products.p_total',
                'status' => 'products.status',
                'user' => 's.name',
                'date' => 'products.p_created_at',
                'image' => 'd.name'
            ])
            ->from([
                'products'
            ])
            ->join([
                'd' => [
                    'table' => 'image',
                    'type' => 'INNER',
                    'conditions' => 'd.product_id = products.p_id',
                ],
                'p' => [
                    'table' => 'products_type',
                    'type' => 'INNER',
                    'conditions' => 'p.p_id = products.p_type_id',
                ],
                's' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 's.id = products.p_user_id',
                ],
            ])
            ->where([
                'products.status' => 1,
                'd.cover' => 1,
                'd.status' => 1
            ])

            ->order(['products.p_id' => 'DESC'])
            ->group('id,title')
            ->limit(3)
            ->toArray();

        $data = [];
        foreach ($Products as $products1) {
            array_push($data, $products1);
        }

        $this->set(compact('data', 'Branch'));
        $this->set('posts', $post);
    }
}
