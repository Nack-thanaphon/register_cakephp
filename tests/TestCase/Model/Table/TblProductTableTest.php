<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblProductTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblProductTable Test Case
 */
class TblProductTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TblProductTable
     */
    protected $TblProduct;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TblProduct',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TblProduct') ? [] : ['className' => TblProductTable::class];
        $this->TblProduct = $this->getTableLocator()->get('TblProduct', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TblProduct);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TblProductTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
