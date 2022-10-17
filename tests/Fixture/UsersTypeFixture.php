<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersTypeFixture
 */
class UsersTypeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'users_type';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'ut_name' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1665746545,
                'updated_at' => 1665746545,
            ],
        ];
        parent::init();
    }
}
