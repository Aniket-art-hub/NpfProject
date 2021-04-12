<?php
namespace App\Controller;

use App\Model\Table\PermissionsTable;
        
use Cake\ORM\TableRegistry;
use cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        $this->loadModel('Users');
        $this->loadModel('Permissions');

    }
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([ 'logout']);
    }
    
    
    //login 
    public function login()
    {
      $this->viewBuilder()->setlayout('userslayout');
      if($this->request->session()->read('user'))
     {
       return $this->redirect(['controller'=>'Users','action' => 'getdata']);
     }
        if ($this->request->is('post')) {
            $Users = $this->Auth->identify();
           
            if ($Users) {
                $this->Auth->setUser($Users);
                 $session = $this->request->getSession();
                 $session->write('user',$Users);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'),[
                    'key' => 'auth']);
        }
       
    }
   //logout
    public function logout()
    {
      $this->request->getSession()->destroy($user);
        return $this->redirect($this->Auth->logout());
         return $this->redirect($this->Auth->redirectUrl());
    }

    //insert data
    use MailerAwareTrait;
	public function add()
	{
    $this->viewBuilder()->setlayout('userslayout');

      $Users = $this->Users->newEntity($this->request->data());
      
        if ($this->request->is('post')) {

        $Users = $this->Users->patchEntity($Users, $this->request->getData());
            if ($this->Users->save($Users)) {
              
           /*   $last=$Users->user_id; 
              echo $last; exit;*/
             //$this->getMailer('User')->send('welcome',[$Users]);

                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'getdata']);
             
            }
            $validation=$Users->errors();
      if(!empty($validation))
      {
      $this->Flash->set($validation,["element"=>"users_error"]);

      }
      
        //$this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
      
        $this->set(compact('Users'));
    $this->set('_serialize',['Users']);
	
	}
    // fetch all data
    public function getdata()
    {
      
       $this->viewBuilder()->setlayout('userslayout');
     // pr($this->Auth->user('username'));
      if($this->Auth->user('role')!='Admin')
      {
  $data=$this->Users->find()->where(['Users.user_id'=>$this->Auth->user('user_id')]);

  } else {

   $data=$this->Users->find();
  }
    $this->set(compact('data'));
    $this->set('_serialize',['data'],$this->Paginate($data, ['limit'=> '5']));
    } 

//find data from permissions table
/*public function fetchdata()
 {
  $this->autoRender=false;
  $data=$this->Users->find()->contain(['Permissions']);
  $this->set('data',$data);
 }*/

    //edit data

    public function edit($id='')
    {
      $this->viewBuilder()->setlayout('userslayout');

     $user=$this->Users->get($id);
     if($this->request->is('post'))
     {
        $user=$this->Users->patchEntity($user,$this->request->getdata());
        if($this->Users->save($user))
        {
            $this->Flash->success(__("Data updated successfully"));
            return $this->redirect(['action'=>'getdata']);
        }
         $this->Flash->error(__("Somethig wrong please try again"));
     }
     $this->set('username',$user->username);
     $this->set('useremail',$user->useremail);
     $this->set('password',$user->password);
     $this->set('designation',$user->designation);
     $this->set('address1',$user->address1);
     $this->set('address2',$user->address2);
     $this->set('pincode',$user->pincode);
     $this->set('role',$user->role);
     $this->set('id',$id);
    }

    //delete data
    public function delete($id='')
    {
      $this->viewBuilder()->setlayout('userslayout');

      $user=$this->Users->get($id);
      if($this->Users->delete($user))
      {
        $this->Flash->success(__('Data Deleted successfully'));
        return $this->redirect(['action'=>'getdata']);
      }   
      $this->Flash->error(__('Somethig wrong please try again'));
    }

    //view only data
    public function readdata($id='')
    {
      $this->viewBuilder()->setlayout('userslayout');

     $data=$this->Users->find()->where(['user_id'=>$this->Auth->user('user_id')]);
    $this->set(compact('data'));
    $this->set('_serialize',['data']); 

    }
  
    //ajax search 
    public function search()
    {
      //$this->viewBuilder()->setlayout('userslayout');
      $this->request->allowmethod('ajax');
      $keyword=$this->request->query('keyword');
      $query=$this->Users->find('all',["conditions"=>['username LIKE'=>'%'.$keyword.'%'],
        'limit'=>5
      ]);
      $this->set('Users',$this->paginate($query));
      $this->set('_serialize',['Users']);
    }

      
    //give permission 
    

public function permission($id='')
 {   
 $this->viewBuilder()->setlayout('userslayout');  
if($this->request->is('post')){
$edit = $this->request->data('edit');
$remove= $this->request->data('remove');
$view= $this->request->data('view');
$users = TableRegistry::get('users');
$user = $users->get($id);
$user->edit = $edit;
$user->remove = $remove;
$user->view= $view;
if($users->save($user))
$this->Flash->success(__('Permission Applied successfully'));
return $this->redirect(['action'=>'getdata']);
} else {
$user = TableRegistry::get('users')->find();
$user = $user->where(['user_id'=>$id])->first();

     $this->set('edit',$user->edit);
     $this->set('remove',$user->remove);
     $this->set('view',$user->view);
     $this->set('id',$id);
    }

  }  

  //roles permissions
  public function rolespermission()
  {
   $this->viewBuilder()->setlayout('userslayout');

  }

  /*public function addpermission()
    {
      $Permissions = $this->Permissions->newEntity();
    
      if($this->request->is('post')) {

    $Permissions = $this->Permissions->patchEntity($Permissions, $this->request->getData());
            if ($this->Permissions->save($Permissions)) {
           
                $this->Flash->success(__('The post has been saved.'));

                //return $this->redirect(['action' => 'getdata']);
             
            }
        $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('Permissions'));
    $this->set('_serialize',['Permissions']);
    
}
*/



}









?>