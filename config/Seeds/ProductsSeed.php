<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Products seed.
 */
class ProductsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "Sample Product 1",
                "cost" => 140,
            ],
            [
                "name" => "Sample Product 2",
                "cost" => 180,
          
            ],
            [
                "name" => "Sample Product 3",
                "cost" => 130,
           
            ]
        ];

        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
