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
        $this->paginate = [
            'contain' => [
                'Users',
            ],
        ];
        $orders = $this->paginate($this->Orders);

        $time = strtotime('today');

     
        $this->set(compact('orders'));
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
                'id' => $order['order_id'],
                'title' => $rowData['p_title'],
                'date' => $order['updated_at'],
                'image' => $rowData['p_image_id'],
                'price' => $itemPrice[$key],
                'Total_price' => array_sum($itemPrice),
                'status' => $itemPrice[$key],
                'total' => $itemCount[$key]
            ]);
        }
   
        $this->set(compact('order','OrdersData'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

           // $uniqueId= time();

        // pr($uniqueId);die;
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

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
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

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
