<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MachinesGames Model
 *
 * @property \App\Model\Table\GamesTable&\Cake\ORM\Association\BelongsTo $Games
 * @property \App\Model\Table\MachinesTable&\Cake\ORM\Association\BelongsTo $Machines
 *
 * @method \App\Model\Entity\MachinesGame newEmptyEntity()
 * @method \App\Model\Entity\MachinesGame newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\MachinesGame> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MachinesGame get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\MachinesGame findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\MachinesGame patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\MachinesGame> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MachinesGame|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\MachinesGame saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\MachinesGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MachinesGame>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MachinesGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MachinesGame> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MachinesGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MachinesGame>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MachinesGame>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MachinesGame> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MachinesGamesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('machines_games');
        $this->setDisplayField(['games_id', 'machine_id']);
        $this->setPrimaryKey(['games_id', 'machine_id']);

        $this->belongsTo('Games', [
            'foreignKey' => 'games_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['games_id'], 'Games'), ['errorField' => 'games_id']);
        $rules->add($rules->existsIn(['machine_id'], 'Machines'), ['errorField' => 'machine_id']);

        return $rules;
    }
}
