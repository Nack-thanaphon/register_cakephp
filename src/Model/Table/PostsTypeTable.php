<?php

declare(strict_types=1);

namespace App\Model\Table;


use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTypeTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('poststype');
        $this->setDisplayField('pt_id');
        $this->setPrimaryKey('pt_id');

        $this->belongsTo('posts', [
            'foreignKey' => 'pt_id',
            'joinType' => 'INNER'
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
            ->scalar('pt_name')
            ->maxLength('pt_name', 255)
            ->requirePresence('pt_name', 'create')
            ->notEmptyString('pt_name');

        $validator
            ->dateTime('pt_created_at')
            ->notEmptyDateTime('pt_created_at');

        $validator
            ->dateTime('pt_updated_at')
            ->notEmptyDateTime('pt_updated_at');

        return $validator;
    }
}
