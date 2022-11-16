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
            ->contain([
                'Users'
            ])
            ->limit(5)
            ->order([
                'orders_code' => 'DESC'
            ]);

        $this->set(compact('countProduct', 'countBranch', 'ordersToday'));
    }


    public function view($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('dashboard'));
    }
}
