<?php
namespace App\Model\Table;

use Cake\ORM\Table;
class Student_detailsTable extends Table
{
 
    public function initialize(array $config)
    {
        parent::initialize($config);
       $this->setTable('courses');
       $this->setPrimaryKey('id');
       $this->hasOne('student_details');
    }
  }
?>

