<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Product;
use Cake\ORM\TableRegistry;


/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiController extends AppController
{
    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    public function product()
    {

        $table = TableRegistry::getTableLocator()->get('Products');
        $product = $table->find('all', ['contain' => ['productstype']])->all();
        
        $this->set('product', $product);
    }
}
