<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

class DashboardController extends AppController
{

    public function index()
    {
        $countProduct =  $this->Custom->countProduct();
        $countBranch =  $this->Custom->countBranch();
        $orderstable = TableRegistry::getTableLocator()->get('Orders');

        $ordersData = [];
        $ordersToday =  $orderstable->find()
            ->contain(['Users'])
            ->where([
                'orders_user_id is NOT' => NULL
            ])
            ->order([
                'Orders.id' => 'DESC'
            ])
            ->limit(4);

            
        $this->set(compact('countProduct', 'countBranch', 'ordersToday'));

        // pr($ordersToday);die;
    }


    public function view($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('dashboard'));
    }
}
