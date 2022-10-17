<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class DashboardController extends AppController
{

    public function index()
    {
  
    }


    public function view($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('dashboard'));
    }

}
