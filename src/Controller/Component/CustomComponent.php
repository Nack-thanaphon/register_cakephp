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


    public function getPromotion()
    {
        $table = TableRegistry::getTableLocator()->get('promotions');
        $promotion = $table->find('all');
        return $promotion;
    }
    public function getProductType()
    {
        $table = TableRegistry::getTableLocator()->get('Productstype');
        $Productstype = $table->find('all');
        return $Productstype;
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
