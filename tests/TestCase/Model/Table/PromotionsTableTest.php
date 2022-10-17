<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PromotionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PromotionsTable Test Case
 */
class PromotionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PromotionsTable
     */
    protected $Promotions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Promotions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Promotions') ? [] : ['className' => PromotionsTable::class];
        $this->Promotions = $this->getTableLocator()->get('Promotions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Promotions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PromotionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
