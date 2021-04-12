<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validation;
class AllsController extends AppController
{
    public $connection;
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
      //$this->connection = ConnectionManager::get("default");
        $this->table=TableRegistry::get("students");
        $this->loadModel('Students'); 
        $this->loadModel('Student_details');
        $this->viewBuilder()->layout('allslayout');
    }
    
    /////join start
    public function join()
    {
    	$this->autoRender=false;
    	 $query = $this->student_tables->newEntity();
    	$query = $Student_details->find('all')->contain(['Citys']);
               foreach ($query as $Student_details){
             echo $Student_details;
       }
    }
    ///join end
      public function check()
      {
        //$this->autoRender=false;
        $this->set("title","project");

      } 
      public function insert()
      {
 $this->autoRender=false;
       if($this->request->is('post')){
$first_name = $this->request->data('first_name');
$last_name = $this->request->data('last_name');
$email = $this->request->data('email');
$city = $this->request->data('city');
$mobile = $this->request->data('mobile');
$users_table = TableRegistry::get('students');
$users = $users_table->newEntity();
$users->first_name = $first_name;
$users->last_name = $last_name;
$users->email = $email;
$users->city = $city;
$users->mobile=$mobile;
if($users_table->save($users))
$this->redirect(["controller"=>"Alls","action"=>"fetchrecord"]);
}
 }
 public function fetchrecord(){
  /*$xys=$this->request->pass;
  pr($xys);*/
$users = TableRegistry::get('students');
$query = $users->find();
$this->set('results',$query);
$this->set('students', $this->Paginate($query, ['limit'=> '5']));
}
         
 public function edit($id=''){
  
if($this->request->is('post')){
$firstname = $this->request->data('first_name');
$lastname= $this->request->data('last_name');
$email= $this->request->data('email');
$city= $this->request->data('city');
$mobile= $this->request->data('mobile');
$users_table = TableRegistry::get('students');
$users = $users_table->get($id);
$users->first_name = $firstname;
$users->last_name = $lastname;
$users->email= $email;
$users->city = $city;
$users->mobile= $mobile;
if($users_table->save($users))
echo "User is udpated";
$this->setAction('fetchrecord');
} else {
$users_table = TableRegistry::get('students')->find();
$users = $users_table->where(['id'=>$id])->first();
$this->set('first_name',$users->first_name);
$this->set('last_name',$users->last_name);
$this->set('email',$users->email);
$this->set('city',$users->city);
$this->set('mobile',$users->mobile);
$this->set('id',$id);
}
}
public function delete($id)
{
 $users_table = TableRegistry::get('students'); 
 $users = $users_table->get($id); 
 $users_table->delete($users);
  echo "User deleted successfully.";
   $this->setAction('fetchrecord'); 
 }  
         
      /*public function insert()
      {
           $this->autoRender=false;
        $data=$this->Students->newEntity();
        $data->id=2;
        $data->name="hgfd";
        $data->email="cxgfd@gmail.com";
        $data->phone=9876543212;
        $this->Students->save($data);
      }
            
      public function select()
      {
           $this->autoRender=false;
        $data=$this->Students->find()->toArray();
        //for condition
        //$data=$this->Students->find("all",["condition"=>["id"=>2]])->toArray();
        print_r($data);
      }*/



}
 	?>
