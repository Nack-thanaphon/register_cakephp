<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contact Model
 *
 * @method \App\Model\Entity\Contact newEmptyEntity()
 * @method \App\Model\Entity\Contact newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Contact[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contact get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contact findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contact[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contact|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contact saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContactTable extends Table
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

        $this->setTable('contact');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('b_name')
            ->allowEmptyString('b_name');

        $validator
            ->scalar('b_adress')
            ->allowEmptyString('b_adress');

        $validator
            ->scalar('b_phone')
            ->allowEmptyString('b_phone');

        $validator
            ->scalar('b_phone1')
            ->allowEmptyString('b_phone1');

        $validator
            ->scalar('b_phone2')
            ->allowEmptyString('b_phone2');

        $validator
            ->scalar('b_phone3')
            ->allowEmptyString('b_phone3');

        $validator
            ->scalar('b_social')
            ->allowEmptyString('b_social');

        $validator
            ->scalar('b_social1')
            ->allowEmptyString('b_social1');

        $validator
            ->scalar('b_social2')
            ->allowEmptyString('b_social2');

        $validator
            ->scalar('b_payment1')
            ->allowEmptyString('b_payment1');

        $validator
            ->scalar('b_payment2')
            ->allowEmptyString('b_payment2');

        $validator
            ->scalar('b_payment3')
            ->allowEmptyString('b_payment3');

        $validator
            ->scalar('b_img')
            ->allowEmptyString('b_img');

        $validator
            ->scalar('b_img1')
            ->allowEmptyString('b_img1');

        $validator
            ->scalar('b_img2')
            ->allowEmptyString('b_img2');

        $validator
            ->scalar('b_img3')
            ->allowEmptyString('b_img3');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        return $validator;
    }
}
