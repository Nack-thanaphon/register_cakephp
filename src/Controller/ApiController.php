<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Product;
use Cake\ORM\TableRegistry;
use PHPUnit\Util\Json;

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
        $productTable = TableRegistry::getTableLocator()->get('Products');
        $Products = $productTable->find()
            ->select([
                'id' => 'products.p_id',
                'title' => 'products.p_title',
                'type' => 'p.pt_name',
                'price' => 'products.p_price',
                'total' => 'products.p_total',
                'status' => 'products.status',
                'user' => 's.name',
                'date' => 'products.p_created_at',
                'image' => 'd.name'
            ])
            ->from([
                'products'
            ])
            ->join([
                'd' => [
                    'table' => 'image',
                    'type' => 'INNER',
                    'conditions' => 'd.product_id = products.p_id',
                ],
                'p' => [
                    'table' => 'products_type',
                    'type' => 'INNER',
                    'conditions' => 'p.p_id = products.p_type_id',
                ],
                's' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 's.id = products.p_user_id',
                ],
            ])
            ->where([
                'products.status' => 1,
                'd.cover' => 1,
                'd.status' => 1
            ])
            ->group('id,title')
            ->toArray();

        $data = [];
        foreach ($Products as $products1) {
           array_push($data,$products1);
        }

        echo json_encode($data);
        die;
    }
}
