<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostsTypeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostsTypeTable Test Case
 */
class PostsTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PostsTypeTable
     */
    protected $PostsType;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PostsType',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PostsType') ? [] : ['className' => PostsTypeTable::class];
        $this->PostsType = $this->getTableLocator()->get('PostsType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PostsType);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PostsTypeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
