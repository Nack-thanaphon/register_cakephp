<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\Model\Entity\Branch;
use Cake\ORM\TableRegistry;

class OrdersController extends AppController
{

    public function index()
    {
        $ordersData = [];
        $ordersToday =  $this->Orders->find()
            ->contain(['Users'])
            ->where([
                'orders_user_id is NOT' => NULL
            ])
            ->order([
                'Orders.id' => 'DESC'
            ])
            ->limit(5);

        $ordersAll =  $this->Orders->find()
            ->contain(['Users'])
            ->where([
                'orders_user_id is NOT' => NULL
            ])
            ->order([
                'Orders.id' => 'DESC'
            ]);

        $this->set(compact('ordersToday', 'ordersAll'));
    }

    public function view($id = null)
    {
        $ProductsTable = TableRegistry::getTableLocator()->get('Products');
        $order = $this->Orders->get($id, [
            'contain' => ['Users'],
        ]);

        $itemDetail = json_decode($order['orders_detail'], true);
        $itemId = [];
        $itemPrice = [];
        $itemCount = [];

        foreach ($itemDetail as $key => $rowData) {
            $itemId[$key] = $rowData['id'];
            $itemPrice[$key] = $rowData['price'];
            $itemCount[$key] = $rowData['count'];
        }

        $ProductsData = $ProductsTable->find('all')
            ->where([
                'Products.p_id IN' => $itemId
            ]);


        $OrdersData = [];

        foreach ($ProductsData as $key => $rowData) {
            $OrdersData[] = ([
                'id' => $order['orders_code'],
                'title' => $rowData['p_title'],
                'date' => $order['updated_at'],
                'image' => $rowData['p_image_id'],
                'price' => $itemPrice[$key],
                'Total_price' => array_sum($itemPrice),
                'status' => $itemPrice[$key],
                'total' => $itemCount[$key]
            ]);
        }

        $this->set(compact('order', 'OrdersData'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'users'));
    }


    public function edit($id = null)
    {
        $ProductsTable = TableRegistry::getTableLocator()->get('Products');
        $imageTable = TableRegistry::getTableLocator()->get('Image');

        $order = $this->Orders->get($id, [
            'contain' => ['Users'],
        ]);

        $itemDetail = json_decode($order['orders_detail'], true);
        $itemId = [];
        $itemPrice = [];
        $itemCount = [];

        foreach ($itemDetail as $key => $rowData) {
            $itemId[$key] = $rowData['id'];
            $itemPrice[$key] = $rowData['price'];
            $itemCount[$key] = $rowData['count'];
        }

        $ProductsData = $ProductsTable->find('all')
            ->where([
                'Products.p_id IN' => $itemId
            ]);



        $imageData = $imageTable->find()
            ->where([
                'product_id IN' => $itemId,
                'cover' => 1,
                'status' => 1
            ])->order([
                'product_id' => 'ASC'
            ])
            ->toArray();

        $OrdersData = [];
        foreach ($ProductsData as $key => $rowData) {

            $OrdersData[] = ([
                'id' => $order['id'],
                'orders_code' => $order['orders_code'],
                'orders_token' => $order['orders_token'],
                'title' => $rowData['p_title'],
                'delivery_service' => $order['delivery_service'],
                'delivery_code' => $order['delivery_code'],
                'p_id' => $rowData['p_id'],
                'product_id' => $imageData[$key]['product_id'],
                'date' => $order['updated_at'],
                'status' => $order['status'],
                'image' => $imageData[$key]['name'],
                'price' => $itemPrice[$key],
                'Total_price' => array_sum($itemPrice),
                'total' => $itemCount[$key]
            ]);
        }


        // pr($OrdersData);die;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'users', 'OrdersData'));
    }

    public function updateStatus()
    {
        if ($this->request->is('post')) {
            $orders_id = $this->request->getData('orders_id');
            $orders_token = $this->request->getData('orders_token');
            $status = $this->request->getData('status');
            $delivery_service = $this->request->getData('delivery_service');
            $delivery_code = $this->request->getData('delivery_code');

            if (!empty($orders_id)) {
                $OrdeStatusUpdate = $this->Orders->newEmptyEntity();
                $OrdeStatusUpdate->id = $orders_id;
                $OrdeStatusUpdate = $this->Orders->patchEntity($OrdeStatusUpdate, array(
                    'status' => $status,
                    'orders_token' => $orders_token,
                    'delivery_service' => $delivery_service,
                    'delivery_code' => $delivery_code
                ));

                // pr($OrdeStatusUpdate);die;
                $this->Orders->save($OrdeStatusUpdate);
                
                $responseData = ['success' => true];
                $this->set('responseData', $responseData);
                $this->set('_serialize', ['responseData']);die;
            }
        }
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
