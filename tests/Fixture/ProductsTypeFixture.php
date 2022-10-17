<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsTypeFixture
 */
class ProductsTypeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'products_type';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'p_id' => 1,
                'pt_user_id' => 1,
                'pt_name' => 1,
                'pt_created_at' => 1664947520,
                'pt_updated_at' => 1664947520,
            ],
        ];
        parent::init();
    }
}
