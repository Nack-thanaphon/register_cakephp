<?php
declare(strict_types=1);

namespace App\Controller;

class ProductsController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['productstype'],
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['productstype'],
        ]);

        $this->set(compact('product'));
    }

}
