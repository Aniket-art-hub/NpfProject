<?php

namespace App\Controller;

use App\Model\Table\TestsTable;
use Cake\ORM\TableRegistry;

class TestsController extends AppController
{
 
    public function initialize()
    {
        parent::initialize();
       $this->table=TableRegistry::get("courses");
        $this->loadModel('Tests');
        $this->loadModel('Courses');
        $this->loadComponent('Flash');
        //$this->loadComponent('Tests');
    }

    //     public function sendemail()
    // {
    //    $email = new Email('default');
    //     $email->from(['kaniket76680@gmail.com' => 'kaniket76680@gmail.com'])
  
    //    ->to('yadavmithlesh784@gmail.com')
    //    ->subject('holispecial')
    //    ->send('hii how r you');
    //   pr($email);exit;
    // }
    

    
    public function add()
    {
        $test = $this->Tests->newEntity();
        if ($this->request->is('post')) {

            $test = $this->Tests->patchEntity($test, $this->request->getData());
            //echo $test;exit;
            if ($this->Tests->save($test)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'alldata']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        
    }

    public function edit($id='')
    {
        $test = $this->Tests->get($id);
        if ($this->request->is('post')) {
            $test = $this->Tests->patchEntity($test, $this->request->getData());
            if ($this->Tests->save($test)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'alldata']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set('name',$test->name);
        $this->set('email',$test->email);
        $this->set('password',$test->password);

        $this->set('id',$id);  
    }

    
    public function delete($id='')
    {
        //$this->request->allowMethod(['delete', 'post']);
        $test = $this->Tests->get($id);
        if ($this->Tests->delete($test)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'alldata']);
    }

     public function alldata()
    {
       
       $test = $this->Tests->find();
        $this->set(compact('test'));
        $this->set('_serialize', ['test']);   
    }





    //insert through component
     /*public function insert()
     {
       // $this->autoRender=false;
        $this->Tests->adddata();
     }*/


}
