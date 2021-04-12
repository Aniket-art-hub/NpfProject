<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

// Now an instance of users Table.
$users =TableRegistry::getTableLocator()->get('permissions');
$query = $users->find();

class PermissionsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('permissions');
        $this->displayfield('id');
        $this->primarykey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users',[
            'foreignKey'=>'userid',
            'joinType'=>'INNER'
            
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id');

        $validator
            ->requirePresence('userid')
            ->notEmpty('userid');

        $validator
            ->requirePresence('edit')
            ->notEmpty('edit');

        $validator
            ->requirePresence('remove')
            ->notEmpty('remove');
        $validator
            ->requirePresence('view')
            ->notEmpty('view');
        return $validator;
    }

    
}
