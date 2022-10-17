<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Mailer\TransportFactory;
use Cake\ORM\Locator\TableLocator;

/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $cart = $this->paginate($this->Cart);

        $this->set(compact('cart'));
    }

    public function view($id = null)
    {
        $cart = $this->Cart->get($id, []);

        $detail = json_decode($cart->c_detail, true);

        $arr = [];
        foreach ($detail as $test) {
            $arr = array(
                'c_id' => $test["id"],
            );
        }
        $id1 = $arr['c_id'];

        $table = TableRegistry::getTableLocator()->get('products');
        $product = $table->get($id1, []);

        $result=[];
        $result = array($detail, $product);
      

        $this->set(compact('result'));

    }




    public function add()
    {
        $usertable = TableRegistry::getTableLocator()->get('cart');
        $cart = $usertable->newemptyEntity();

        if ($this->request->isPost()) {
            // get values here 
            $cdetail = $this->request->getData('c_detail');
            $cart->c_detail = $cdetail;
            $usertable->save($cart);
        }
    }


    public function edit($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Cart->patchEntity($cart, $this->request->getData());
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $this->set(compact('cart'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Cart->get($id);
        if ($this->Cart->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
