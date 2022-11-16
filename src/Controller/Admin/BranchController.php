<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\Model\Entity\Branch;
use Cake\ORM\TableRegistry;

class BranchController extends AppController
{

    public function index()
    {
        $BranchData = $this->Branch->find('all')
            ->order(['id' => 'DESC']);
        $Branch1 = [];
        $Branch2 = [];
        foreach ($BranchData as $data) {
            $Branch1[] = array(
                "id" => $data->id,
                "name" => $data->b_name,
                "link" => $data->b_link,
                "map" => $data->b_map,
                "phone" => $data->b_phone,
                "province" => $data->b_province,
            );
        }
        $this->viewBuilder()->setOption('serialize', true);

        $this->set(compact('Branch1'));
    }

    public function view($id = null)
    {
        $Branch = $this->Branch->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('Branch'));
    }

    public function add()
    {
        $BranchTable = TableRegistry::getTableLocator()->get('Branch');
        $BranchData = $BranchTable->newEmptyEntity();
        if (!empty($this->request->is("post"))) {
            $BranchData->b_province =  $this->request->getData('b_province');
            $BranchData->b_name =  $this->request->getData('b_name');
            $BranchData->b_phone =  $this->request->getData('b_phone');
            $BranchData->b_link =  $this->request->getData('b_link');
            $BranchData->b_map =  $this->request->getData('b_map');
            $BranchData->b_status = 1;

            if ($BranchTable->save($BranchData)) {
                $responseData = ['success' => true];
                $this->set('responseData', $responseData);
                $this->set('_serialize', ['responseData']);
            }
        }
    }

    public function edit()
    {
        $editid = $this->request->getData('id');
        $Branch = $this->Branch->get($editid, [
            'contain' => [],
        ]);
        $this->set('Branch', $Branch);
        $this->set('_serialize', ['Branch']);
    }

    public function update()
    {
        $editid = $this->request->getData('id');
        $Branch = $this->Branch->get($editid, [
            'contain' => [],
        ]);
        if ($this->request->is('post')) {
            $Branch = $this->Branch->patchEntity($Branch, $this->request->getData());

            if ($this->Branch->save($Branch)) {
                $responseData = ['success' => true];
                $this->set('responseData', $responseData);
                $this->set('_serialize', ['responseData']);
            }
        }
    }

    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->getData('id');
        $Branch = $this->Branch->get($id);
        if ($this->Branch->delete($Branch)) {
            $responseData = ['success' => true];
            $this->set('responseData', $responseData);
            $this->set('_serialize', ['responseData']);
        } else {
            $responseData = ['success' => false];
            $this->set('responseData', $responseData);
            $this->set('_serialize', ['responseData']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
