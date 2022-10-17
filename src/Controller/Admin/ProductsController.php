<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

use Cake\ORM\TableRegistry;


/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{


    public function index()
    {
        $table = TableRegistry::getTableLocator()->get('Products');
        $products = $this->paginate($this->Products);
        $products = $table->find('all', ['contain' => ['productstype']])->all();

        $this->set('product', $products);
    }

    public function view()
    {
        if ($this->request->is('post')) {
            $id = $this->request->getData('p_id');
            $product = $this->Products->get($id, [
                'contain' => [],
            ]);
    
            $this->set(['product' => $product]);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->set('promotion', $promotion =  $this->Custom->getPromotion());
        $this->set('productsType',  $productsType =  $this->Custom->getProductType());

        $product = $this->Products->newEmptyEntity();

        if ($this->request->is("post")) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("p_image_id");
            $productType = $this->request->getData("p_type_id");
            $hasFileError = $productImage->getError();

            if ($hasFileError > 0) {
                $data["p_image_id"] = "";
            } else {
                // file uploaded
                $fileName = $productImage->getClientFilename();
                $fileType = $productImage->getClientMediaType();

                if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                    $imagePath = WWW_ROOT . "img/" . DS . $fileName;
                    $productImage->moveTo($imagePath);
                    $data["p_image_id"] = "img/" . $fileName;
                }
            }
            $product = $this->Products->patchEntity($product, $data);
            $product->p_user_id = 2;

            // debug($product);
            if ($this->Products->save($product)) {
                $this->Flash->success("Product created successfully");
                $this->redirect(([
                    'Prefix' => 'Admin',
                    'controller' => 'products',
                    'action' => 'index'
                ]));
            } else {
                $this->Flash->error("Failed to create product");
            }
        }

        $this->set(compact("product"));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['post'])) {
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
