<?php

declare(strict_types=1);

namespace App\Controller;

class ProductsController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductsType'],
        ];
        $Products = $this->paginate($this->Products);

        $this->set(compact('Products'));
    }

    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['ProductsType'],
        ]);

        $this->set(compact('product'));
    }
}
