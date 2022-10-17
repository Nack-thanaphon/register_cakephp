<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostsTypeFixture
 */
class PostsTypeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'poststype';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'pt_id' => 1,
                'pt_name' => 'Lorem ipsum dolor sit amet',
                'pt_created_at' => 1665984434,
                'pt_updated_at' => 1665984434,
            ],
        ];
        parent::init();
    }
}
