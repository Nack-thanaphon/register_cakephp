<?php

declare(strict_types=1);

namespace App\Controller\Customer;


use App\Controller\Customer\AppController;
use Cake\Mailer\Mailer;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Mailer\TransportFactory;
use Cake\ORM\Locator\TableLocator;

class DashboardController  extends AppController
{

    public function index()
    {
        $session = $this->request->getSession();
        $cartTokensession =  $session->read('cartToken');
        if (empty($cartTokensession)) {
            return $this->redirect([
                'prefix' => 'Customer',
                'controller' => 'dashboard',
                'action' => 'index',
            ]);
        } else {
            return $this->redirect([
                'prefix' => 'Customer',
                'controller' => 'dashboard',
                'action' => 'payment',
                $cartTokensession
            ]);
        }
    }

    public function view($token = null)
    {
        $user = $this->Users->find()
            ->where([
                'token =' => $token
            ])
            ->contain(['UsersType', 'UsersRole'])
            ->first();

        // pr($user);
        // die;
        $this->set(compact('user'));
    }


    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        $this->set(compact('user'));
    }
    public function paymentUpload()
    {
        $imageTable = TableRegistry::getTableLocator()->get('Image');
        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');
        $session = $this->request->getSession();
        $session->delete('cartToken');

        if ($this->request->is('post')) {
            $paymentImg = $this->request->getData('paymentImg');
            $orders_id = $this->request->getData('orders_id');
            $orders_token = $this->request->getData('orders_token');
            $paymentImgId = $this->request->getData('paymentImgId');
            $hasFileError = $paymentImg->getError();

            $paymentImgId1 = '';
            if (!empty($paymentImgId)) {
                $paymentImgId1 = $paymentImgId;
            } else {
                $paymentImgId1 = '';
            }

            if ($hasFileError > 0) {
                $paymentImgSaveDB = '';
            } else {
                // file uploaded
                $fileName = $paymentImg->getClientFilename();
                $fileType = $paymentImg->getClientMediaType();
                $fileData = $paymentImg->getStream();

                if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                    $newfilename = $orders_token . "." . $fileType;
                    $moveto  = WWW_ROOT . "img/payment" . DS . $fileName;;
                    $paymentImg->moveTo($moveto);
                    $paymentImgSaveDB = "img/payment/" . $fileName;
                    $paymentimageData = $imageTable->newEmptyEntity();
                    $OrderStatusData = $OrdersTable->newEmptyEntity();

                    if (!empty($paymentImgId1)) {
                        $paymentimageData->id = $paymentImgId;
                        $paymentimageData = $imageTable->patchEntity($paymentimageData, array(
                            "order_id" => $orders_id,
                            "name" => $paymentImgSaveDB,
                            "cover" => 1,
                            "status" => 1,
                        ));
                        if ($imageTable->save($paymentimageData)) {
                            $OrderStatusData->id = $orders_id;
                            $OrderStatusData->status = 2;
                            $OrdersTable->save($OrderStatusData);

                            $responseData = ['success' => true];
                            $this->set('responseData', $responseData);
                            $this->set('_serialize', ['responseData']);
                        }
                        die;
                    } else {
                        $paymentimageData = $imageTable->patchEntity($paymentimageData, array(
                            "order_id" => $orders_id,
                            "name" => $paymentImgSaveDB,
                            "cover" => 1,
                            "status" => 1,
                        ));
                        if ($imageTable->save($paymentimageData)) {
                            $OrderStatusData->id = $orders_id;
                            $OrderStatusData->status = 2;
                            $OrdersTable->save($OrderStatusData);
                            $responseData = ['success' => true];
                            $this->set('responseData', $responseData);
                            $this->set('_serialize', ['responseData']);
                        }
                        die;
                    }
                }
            }
        }
    }


    public function payment($token = null)
    {
        $ProductsTable = TableRegistry::getTableLocator()->get('Products');
        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');
        $ImageTable = TableRegistry::getTableLocator()->get('Image');

        $order = $OrdersTable->find()
            ->where([
                "Orders.orders_token =" => $token
            ])->toArray();

        $itemDetail = json_decode($order[0]['orders_detail'], true);
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

        $ProductsDataImage = $ImageTable->find()
            ->where([
                'product_id IN' => $itemId,
                'cover' => 1,
                'status' => 1
            ])->order([
                'product_id' => 'ASC'
            ])
            ->toArray();

        $PaymentDataImage = $ImageTable->find()
            ->where([
                'order_id' => $order[0]['id'],
                'status' => 1
            ])->first();

        $PaymentDataImageId = 0;
        $PaymentDataImageName = '';

        if (!empty($PaymentDataImage['id'])) {
            $PaymentDataImageId = $PaymentDataImage['id'];
            $PaymentDataImageName = $PaymentDataImage['name'];
        }

        $OrdersData = [];
        foreach ($ProductsData as $key => $rowData) {
            $OrdersData[] = ([
                'id' => $order[0]['id'],
                'orders_id' => $order[0]['orders_code'],
                'orders_token' => $order[0]['orders_token'],
                'title' => $rowData['p_title'],
                'date' => $order[0]['updated_at'],
                'paymentimageId' => $PaymentDataImageId,
                'paymentimage' => $PaymentDataImageName,
                'productsimage' => $ProductsDataImage[$key]['name'],
                'price' => $itemPrice[$key],
                'Total_price' => array_sum($itemPrice),
                'status' => $itemPrice[$key],
                'total' => $itemCount[$key]
            ]);
        }
        // pr($OrdersData);
        // die;
        $this->set(compact('order', 'OrdersData'));
    }


    public function edit($token = null)
    {
        $user = $this->Users->find()
            ->where([
                'token =' => $token
            ])
            ->contain(['UsersType', 'UsersRole'])
            ->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            // pr($this->request->getData());die;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $userimg = $this->request->getData("image");
            $hasFileError = $userimg->getError();

            if ($hasFileError > 0) {
                $data["image"] = "";
            } else {
                // file uploaded
                $fileName = $userimg->getClientFilename();
                $fileType = $userimg->getClientMediaType();

                if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                    $imagePath = WWW_ROOT . "img/user/" . DS . $fileName;
                    $userimg->moveTo($imagePath);
                    $data["image"] = "img/user/" . $fileName;
                }
            }
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
}
