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
            $usertable = TableRegistry::getTableLocator()->get('users');
            $user = $usertable->get($id, [
                'contain' => ['userstype', 'usersrole']
            ]);
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
        $table = TableRegistry::getTableLocator()->get('productstype');
        $productstype = $table->find('all');
        return $productstype;
    }
}
