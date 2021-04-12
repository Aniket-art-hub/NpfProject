
<div style="margin-left:30%; width:400px; background:blue;">
<h3>Registration Form</h3>
<?php

echo $this->Form->create(null,['action'=>'validator','method'=>'post']);
echo "<br>";
echo $this->Form->input('name',['label'=>'Enter name here','placeholder'=>'Please enter your name']);
echo "<br>";
echo $this->Form->input('email',['placeholder'=>'Please enter your email']);
echo "<br>";
echo $this->Form->input('password',array('type'=>'password','placeholder'=>'Please enter your password'));
echo "<br>";
echo $this->Form->input('mobilenumber',['placeholder'=>'Please enter your mobile number']);
echo "<br>";
echo $this->Form->button('submit');
echo $this->Form->end();
?>
</div>