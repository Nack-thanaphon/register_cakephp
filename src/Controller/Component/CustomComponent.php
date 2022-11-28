<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Expr\Empty_;

class CustomComponent extends Component
{
    public function GetUserData($id = null)
    {
        if (!empty($id)) {
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $user = $usertable->find()
                ->select([
                    'id' => 'users.id',
                    'email' => 'users.email',
                    'name' => 'users.name',
                    'role' => 'ur.ur_name'
                ])
                ->join([
                    'ur' => ([
                        'table' => 'users_role',
                        'type' => 'INNER',
                        'conditions' => 'ur.id = users.user_type_id'
                    ])
                ])
                ->from('users')
                ->where([
                    'users.id =' => $id
                ])
                ->toArray();
            return $user;
        }
    }

    public function getOrderStatus($orderId)
    {

        $Orderstable = TableRegistry::getTableLocator()->get('Orders');
        $OdersData = $Orderstable->find()
            ->where([
                'id' => $orderId
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

    public function getPromotion()
    {
        $table = TableRegistry::getTableLocator()->get('Promotions');
        $promotion = $table->find('all');
        return $promotion;
    }
    public function getProductType()
    {
        $table = TableRegistry::getTableLocator()->get('ProductsType');
        $Productstype = $table->find('all');
        return $Productstype;
    }

    public function getPostsType()
    {
        $table = TableRegistry::getTableLocator()->get('PostsType');
        $getPostsType = $table->find('all');
        return $getPostsType;
    }
    public function countProduct()
    {
        $table = TableRegistry::getTableLocator()->get('Products');
        $countProduct = $table->find()->count();
        return $countProduct;
    }
    public function countBranch()
    {
        $table = TableRegistry::getTableLocator()->get('Branch');
        $countBranch = $table->find()->count();
        return $countBranch;
    }

    public function countBalance()
    {
        $table = TableRegistry::getTableLocator()->get('orders');
        $countBranch = $table->find()->count();
        return $countBranch;
    }
}
