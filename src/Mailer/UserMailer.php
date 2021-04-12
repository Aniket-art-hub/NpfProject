<?php
namespace App\Mailer;
use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{

static public $name='User';

  public function welcome($Users)
{
	$this->to($Users->useremail)
	->profile('mailjet')
	->emailformat('html')
	->template('mailjet_email_template')
	->layout('user')
	->viewVars(['name'=>$Users->username])
	->subject(sprintf('mail jet,%s',$Users->username));

}
}
