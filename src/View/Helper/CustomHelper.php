<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\StringTemplateTrait;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use PharIo\Version\PreReleaseSuffix;

class customHelper extends Helper
{


    public function countBalance()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');
        $countBalance = $table->find('all', [
            "contain" => ['Users']
        ])->toArray();
        return $countBalance;
    }
    public function countPost()
    {
        $table = TableRegistry::getTableLocator()->get('Posts');
        $countPost = $table->find()->limit(3)->toArray();
        return $countPost;
    }

    public function CountBalanceByYear()
    {
        $arr = [
            [
                "month" => "jan",
                "total" => 300450,
            ],
            [
                "month" => "feb",
                "total" => 23000,
            ],
            [
                "month" => "march",
                "total" => 3000,
            ],
            [
                "month" => "mar",
                "total" => 110000,
            ],
        ];



        return $arr;

        // get data from sql 
        // get m 
        // if  m = m list 
        // ++ 
        // else 
        // 0

        // gr
    }
}
