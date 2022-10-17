<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTypeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTypeTable Test Case
 */
class UsersTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTypeTable
     */
    protected $UsersType;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UsersType',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsersType') ? [] : ['className' => UsersTypeTable::class];
        $this->UsersType = $this->getTableLocator()->get('UsersType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsersType);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersTypeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
