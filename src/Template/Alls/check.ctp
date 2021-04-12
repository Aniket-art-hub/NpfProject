<?php
echo $this->Form->create("students",array("action"=>"insert"));
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('email');
echo $this->Form->input('city');
echo $this->form->input('mobile');
echo $this->Form->button('Submit');
echo $this->Form->end();
?>

