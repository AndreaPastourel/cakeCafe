<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Machines Model
 *
 * @property \App\Model\Table\TypesTable&\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\GamesTable&\Cake\ORM\Association\BelongsToMany $Games
 *
 * @method \App\Model\Entity\Machine newEmptyEntity()
 * @method \App\Model\Entity\Machine newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Machine> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Machine get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Machine findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Machine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Machine> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Machine|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Machine saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Machine>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Machine>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Machine>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Machine> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Machine>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Machine>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Machine>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Machine> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MachinesTable extends Table
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

        $this->setTable('machines');
        $this->setDisplayField('machine_id');
        $this->setPrimaryKey('machine_id');

        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
        ]);
        $this->belongsToMany('Games', [
            'foreignKey' => 'machine_id',
            'targetForeignKey' => 'game_id',
            'joinTable' => 'machines_games',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('processor')
            ->maxLength('processor', 255)
            ->allowEmptyString('processor');

        $validator
            ->scalar('memory')
            ->maxLength('memory', 255)
            ->allowEmptyString('memory');

        $validator
            ->scalar('os')
            ->allowEmptyString('os');

        $validator
            ->scalar('status')
            ->maxLength('status', 50)
            ->allowEmptyString('status');

        $validator
            ->integer('type_id')
            ->allowEmptyString('type_id');

        return $validator;
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
        $rules->add($rules->existsIn(['type_id'], 'Types'), ['errorField' => 'type_id']);

        return $rules;
    }
}
