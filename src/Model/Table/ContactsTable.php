<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContactsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('contacts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
		$this->belongsTo('Companies');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
			->requirePresence('first_name')
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->notEmptyString('first_name');
        $validator
			->requirePresence('last_name')
            ->scalar('last_name')
            ->maxLength('last_name', 255)
             ->notEmptyString('last_name');
		$validator
			->requirePresence('phone_number')
            ->scalar('phone_number')
            ->maxLength('phone_number', 10)
             ->notEmptyString('phone_number');

		$validator
			->requirePresence('address')
            ->scalar('address')
            ->maxLength('address', 255)
             ->notEmptyString('address');
		$validator
			->requirePresence('company_id');
			 
		$validator
			->requirePresence('notes')
            ->scalar('notes')
            ->maxLength('notes', 255)
             ->notEmptyString('notes');	
		$validator
			->requirePresence('add_notes')
            ->scalar('add_notes')
            ->maxLength('add_notes', 255)
             ->notEmptyString('add_notes');	
		$validator
			->requirePresence('internal_notes')
            ->scalar('internal_notes')
            ->maxLength('internal_notes', 255)
             ->notEmptyString('internal_notes');
		$validator
			->requirePresence('comments')
            ->scalar('comments')
            ->maxLength('comments', 255)
             ->notEmptyString('comments');		
			 

        /* $validator
			->requirePresence('username')
            ->scalar('username')
			->add('username', [
				'unique' => [
					'rule' => [
					  'validateUnique'
					],
					'message'=>'Please enter unique username.',
					'provider' => 'table'
				]
			])
            ->maxLength('username', 255)
            ->notEmptyString('username');

        $validator
			->requirePresence('email')
            ->email('email','Invalid email')
			->add('email', [
				'unique' => [
					'rule' => [
					  'validateUnique'
					],
					'message'=>'Please enter unique email.',
					'provider' => 'table'
				]
			])
            ->notEmptyString('email');

        $validator
			->requirePresence('password')
            ->scalar('password')
            ->maxLength('password', 255)
            ->notEmptyString('password') */;

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
