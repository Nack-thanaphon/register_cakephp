<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;


class UsersController extends AppController
{

    public function index()
    {
        $users = $this->Users->find('all', [
            'contain' => ['UsersType', 'UsersRole'],
        ])->order([
            'Users.id' => 'DESC'
        ])->toArray();

        $usersUnVerifiled = $this->Users->find('all', [
            'contain' => ['UsersType', 'UsersRole'],
        ])->where([
            'verified =' => 0
        ])->order(['Users.id' => 'DESC'
        ])->limit(5)->toArray();



        $this->set(compact('usersUnVerifiled', 'users'));
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


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



}
