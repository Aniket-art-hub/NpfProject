<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

// Now an instance of users Table.
$users =TableRegistry::getTableLocator()->get('users');
$query = $users->find();

class UsersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('users');
        $this->displayfield('user_id');
        $this->primarykey('user_id');
        $this->addBehavior('Timestamp');

        $this->hasone('Permissions',[
            'foreignKey'=>'userid'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('user_id')
            ->allowEmpty('user_id');

        $validator
            ->requirePresence('username')
            ->notEmpty('username','please fill your username');

        $validator
            ->requirePresence('useremail')
            ->notEmpty('useremail','please enter email-id')
             ->add('useremail', 'unique', [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Email is already exist'
             ]);

        $validator
            ->requirePresence('password')
            ->notEmpty('password','please enter correct password');
      
        $validator
            ->requirePresence('designation')
            ->notEmpty('designation','choose designation');

        $validator
            ->requirePresence('address1')
            ->notEmpty('address1','please enter correct address1');

        $validator
            ->requirePresence('address2')
            ->notEmpty('address2','please enter correct address1');

        $validator
            ->requirePresence('pincode')
            ->notEmpty('pincode','please enter pincode');
        $validator
            ->requirePresence('role')
            ->notEmpty('role','please select role');
             /*$validator
            ->requirePresence('page1')
            ->notEmpty('page1');
                $validator
            ->requirePresence('page2')
            ->notEmpty('page2');

             $validator
            ->requirePresence('page3')
            ->notEmpty('page3');*/

        return $validator;
    }

    
}
