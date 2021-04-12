<?php

namespace App\Model\Table;

use App\Model\Entity\Category;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Association\HasOne;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class TestsTable extends Table
{

      public function initialize(array $config)
    {
        
        parent::initialize($config);
           
        $this->setTable('tests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasone('courses');
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id' );

        $validator
            ->requirePresence('name')
            ->notEmpty('name');

        $validator
            ->requirePresence('email')
            ->notEmpty('email');

        $validator
           // ->integer('password')
            ->requirePresence('password')
            ->notEmpty('password');
      
          $validator
            ->requirePresence('class')
            ->notEmpty('class');
        return $validator;
    }

    
}
