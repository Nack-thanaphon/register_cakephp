<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\StringTemplateTrait;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use PharIo\Version\PreReleaseSuffix;

class customHelper extends Helper
{

    public function getOrderStatus($orderId)
    {

        $Orderstable = TableRegistry::getTableLocator()->get('Orders');
        $OdersData = $Orderstable->find()
            ->where([
                'Orders.id IN' => $orderId
            ])->first();

        $status = '';

        if ($OdersData->status == 0) {
            $status = 'ยกเลิก';
        }
        if ($OdersData->status == 1) {
            $status = 'รอการชำระเงิน';
        }
        if ($OdersData->status == 2) {
            echo 'ชำระเงินแล้ว';
        }
        if ($OdersData->status == 3) {
            echo 'กำลังดำเนินการ';
        }
        if ($OdersData->status == 4) {
            $status = 'จัดส่งแล้ว';
        }

        return $status;
    }
    public function countBalance()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');
        $countBalance = $table->find('all', [
            "contain" => ['Users']
        ])->toArray();
        return $countBalance;
    }
    public function countOrders()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');
        $countOrders = $table->find()->limit(3)->toArray();
        return $countOrders;
    }
    public function countPost()
    {
        $table = TableRegistry::getTableLocator()->get('Posts');
        $countPost = $table->find()
            ->select([
                'title' => 'Posts.p_title',
                'posttype' => 'PostType.pt_name',
                'user' => 'Users.name',
                'userrole' => 'Role.ur_name',
                'date' => 'Posts.p_created_at',
            ])
            ->join([
                'Users' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 'Users.id = Posts.p_user_id',
                ],
                'PostType' => [
                    'table' => 'posts_type',
                    'type' => 'INNER',
                    'conditions' => 'PostType.pt_id = Posts.p_type_id',
                ],
                'Role' => [
                    'table' => 'users_role',
                    'type' => 'INNER',
                    'conditions' => 'Role.id = Users.user_role_id',
                ],
            ])
            ->order([
                'Posts.id' => 'DESC'
            ])->limit(3)->toArray();

        return $countPost;
    }

    public function CountBalanceByYear()
    {
        $arr = [
            [
                "month" => "jan",
                "total" => 300450,
            ],
            [
                "month" => "feb",
                "total" => 23000,
            ],
            [
                "month" => "march",
                "total" => 3000,
            ],
            [
                "month" => "mar",
                "total" => 110000,
            ],
        ];



        return $arr;

        // get data from sql 
        // get m 
        // if  m = m list 
        // ++ 
        // else 
        // 0

        // gr
    }
    public function countProduct()
    {
        $table = TableRegistry::getTableLocator()->get('Products');
        $countProduct = $table->find()->count();
        return $countProduct;
    }

    public function countProductType()
    {
        $table = TableRegistry::getTableLocator()->get('ProductsType');
        $countProductType = $table->find()->count();
        return $countProductType;
    }
    public function countPromotion()
    {
        $table = TableRegistry::getTableLocator()->get('Promotions');
        $countPromotion = $table->find()->count();
        return $countPromotion;
    }
}
