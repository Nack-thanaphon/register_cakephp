<?php

namespace App\Controller\Component;

use Cake\Controller\Controller;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Expr\Empty_;

class CustomComponent extends Component
{

    public function GetUsertoken($result = null)
    {
        if (!empty($result)) {
            $Usertoken = '';
            if (!empty($result['token'])) {
                $Usertoken = $result['token'];
            }
            return $Usertoken;
        }
    }
    public function getProductsType()
    {
        $ProductsType = TableRegistry::getTableLocator()->get('ProductsType');
        $getProductsType = $ProductsType->find('all')->toArray();
        return $getProductsType;
    }

    public function GetUserDataById($id)
    {
        if (!empty($id)) {
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $user = $usertable->find()
                ->select([
                    'id' => 'users.id',
                    'token' => 'users.token',
                    'email' => 'users.email',
                    'address' => 'users.address',
                    'phone' => 'users.phone',
                    'name' => 'users.name',
                    'role' => 'ur.ur_name'
                ])
                ->join([
                    'ur' => ([
                        'table' => 'users_role',
                        'type' => 'INNER',
                        'conditions' => 'ur.id = users.user_role_id'
                    ])
                ])
                ->from('users')
                ->where([
                    'users.id' => $id
                ])
                ->toArray();
            return $user;
        }
    }
    public function GetUserData($token)
    {
        if (!empty($token)) {
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $user = $usertable->find()
                ->select([
                    'id' => 'users.id',
                    'token' => 'users.token',
                    'email' => 'users.email',
                    'address' => 'users.address',
                    'phone' => 'users.phone',
                    'name' => 'users.name',
                    'role' => 'ur.ur_name'
                ])
                ->join([
                    'ur' => ([
                        'table' => 'users_role',
                        'type' => 'INNER',
                        'conditions' => 'ur.id = users.user_role_id'
                    ])
                ])
                ->from('users')
                ->where([
                    'users.token' => $token
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
            $status = '<span class="text-danger"><i class="fas fa-check-circle"></i> ยกเลิก</span>';
        }
        if ($OdersData->status == 1) {
            $status = '<span class="text-muted"><i class="fas fa-check-circle"></i> รอการชำระเงิน</span>';
        }
        if ($OdersData->status == 2) {
            $status = '<span class="text-primary"><i class="fas fa-check-circle"></i> รอการตรวจสอบ</span>';
        }
        if ($OdersData->status == 3) {
            $status = '<span class="text-primary"><i class="fas fa-check-circle"></i> ชำระเงินแล้ว</span>';
        }
        if ($OdersData->status == 4) {
            $status = '<span class="text-muted"><i class="fas fa-check-circle"></i> กำลังดำเนินการ</span>';
        }
        if ($OdersData->status == 5) {
            $status = '<span class="text-success"><i class="fas fa-check-circle"></i> จัดส่งแล้ว</span>';
        }


        echo $status;
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
    public function countTotal()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');

        $query = $table->find();
        $res = $query->select(['total_sum' => $query->func()->sum('total_price')])
            ->where([
                'status IN' => [3, 5]
            ])->first(); //perform the sum operation 
        $total = $res->total_sum;

        return $total;
    }
    public function countBalance()
    {
        $table = TableRegistry::getTableLocator()->get('orders');
        $countBranch = $table->find()->count();
        return $countBranch;
    }
    public function GetContactData()
    {
        $table = TableRegistry::getTableLocator()->get('Contact');
        $GetContactData = $table->find('all')->first();
        return $GetContactData;
    }
}
