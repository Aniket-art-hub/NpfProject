<?php
namespace App\Controller;

use App\Model\Table\PermissionsTable;
use Cake\ORM\TableRegistry;
use cake\Event\Event;

class PermissionsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        $this->loadModel('Permissions');
        $this->loadModel('Users');

    }

    /*public function addpermission()
    {
      $Permissions = $this->Permissions->newEntity();
        if ($this->request->is('post')) 
        {
        $Permissions = $this->Permissions->patchEntity($Permissions, $this->request->getData());
            if ($this->Permissions->save($Permissions))
             {
           
                $this->Flash->success(__('The post has been saved.'));

                /*return $this->redirect(['action' => 'getdata']);*/
             
          /*  }
        $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('Permissions'));
        $this->set('_serialize',['Permissions']);
    
    }*/

 public function addpermission($id='')
{

if($this->request->is('post')){
$userid = $this->request->data('userid');
$edit = $this->request->data('edit');
$remove = $this->request->data('remove');
$view = $this->request->data('view');
$permission = TableRegistry::get('permissions');
$users = $permission->newEntity();
$users->userid = $userid;
$users->edit = $edit;
$users->remove = $remove;
$users->view = $view;

if($permission->save($users))
$this->Flash->success(__('Permission Applied successfully'));
$this->redirect(["controller"=>"users","action"=>"getdata"]);
}
$this->set('id',$id);
 }
 
 //update permission
 /*public function updatepermission($id='')
 {       
 if($this->request->is('post'))
 {
  //echo $id; exit;
  $edit = $this->request->data('edit');
  $remove= $this->request->data('remove');
  $view= $this->request->data('view');
  $permissions = TableRegistry::get('permissions');
  $permission = $permissions->get($id);
  $permission->edit = $edit;
  $permission->remove = $remove;
  $permission->view= $view;
 if($permissions->save($permission))
 // pr($permission['edit']); exit;
 $this->Flash->success(__('Permission Updated successfully'));
 return $this->redirect(["controller"=>"users",'action'=>'getdata']);
 } else {
 $permissions = TableRegistry::get('permissions')->find();
//echo $permissions; exit;
 $permission = $permissions->where(['permissions.userid'=>$id])->first();
//echo $permission; exit;
     $this->set('edit',$permission->edit);
     $this->set('remove',$permission->remove);
     $this->set('view',$permission->view);
     $this->set('userid',$id);
    }

  } */ 



}
?>