<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
class TestsComponent extends Component
{
	public function adddata()
	{
       
if($this->request->is('post')){
$first_name = $this->request->data('first_name');
$last_name = $this->request->data('last_name');
$email = $this->request->data('email');
$city = $this->request->data('city');
$mobile = $this->request->data('mobile');
$password = $this->request->data('password');
$users_table = TableRegistry::get('students');
$users = $users_table->newEntity();
$users->first_name = $first_name;
$users->last_name = $last_name;
$users->email = $email;
$users->city = $city;
$users->mobile=$mobile;
$users->password=$password;
if($users_table->save($users))
	echo "data save successfully";

}
	}
}










?>