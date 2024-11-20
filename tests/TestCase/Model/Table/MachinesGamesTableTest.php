<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachinesGamesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachinesGamesTable Test Case
 */
class MachinesGamesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MachinesGamesTable
     */
    protected $MachinesGames;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.MachinesGames',
        'app.Games',
        'app.Machines',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MachinesGames') ? [] : ['className' => MachinesGamesTable::class];
        $this->MachinesGames = $this->getTableLocator()->get('MachinesGames', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MachinesGames);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MachinesGamesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
