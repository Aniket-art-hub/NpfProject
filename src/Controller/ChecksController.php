  <?php
  namespace App\Controller;
  use App\Controller\AppController;
  use Cake\Validation\Validator;
  use Cake\ORM\TableRegistry;
  use Cake\Datasource\ConnectionManager;
  use Cake\Auth\DefaultPasswordHasher;
 //use Cake\Http\Middleware\CsrfProtectionMiddleware;

 class ChecksController extends AppController
 { 
    //public $table;
    public function initialize()
    {
    parent::initialize();
    
    $this->loadComponent('url');
    }

 	public function index()
 	{
           
  }
 
 	public function add()
 	{
 		$this->autoRender=false;
     
 		if($this->request->is('post')){
      $name = $this->request->data('name');
      $email = $this->request->data('email');
      $password = $this->request->data('password');
      $mobilenumber = $this->request->data('mobilenumber');
      $user = TableRegistry::get('users');
      $users = $user->newEntity();
      $users->name = $name;
      $users->email = $email;
      $users->password = $password;
      $users->mobilenumber = $mobilenumber;
      if ($articlesTable->save($article)) {
    // The $article entity contains the id now
    echo "data save";
     }
      if($users->submit($users))
      echo "User is added.";
     }
 	}

 public function validator()
 	{
 		$this->autoRender=false;
 		$validator = new Validator();
     $data=array($this->request->data("name"), 
      $this->request->data("email"),  
      $this->request->data("password"),
      $this->request->data("mobilenumber"));
 		$validator
  ->requirePresence('email')
  ->add('email', 'validFormat', [
    'rule' => 'email',
    'message' => 'E-mail must be valid'
  ])
  ->requirePresence('name')
  ->notEmpty('name', 'We need your name.')
  ->requirePresence('password')
  ->notEmpty('password', 'You need to enter password.')
  ->requirePresence('mobilenumber')
  ->notEmpty('mobilenumber', 'You need to enter mobilenumber.');
 $errors = $validator->errors($this->request->getdata());
 if (!empty($errors)) {
  // Send an email.
  print_r($errors);
 } 
 else
 {
  echo "data insert successfully";
  echo "<br>";
   echo $this->request->data("name"); 
     echo "<br>";
       echo $this->request->data("email");  
       echo "<br>";
         echo $this->request->data("password");
         echo "<br>"; 
           echo $this->request->data("mobilenumber");
 }
 	}
     
 }
?>