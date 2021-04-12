<?php
echo $this->Form->create("students",array("action"=>'edit/'.$id));
echo $this->Form->input('first_name',["value"=>$first_name]);
echo $this->Form->input('last_name',["value"=>$last_name]);
echo $this->Form->input('email',["value"=>$email]);
echo $this->Form->input('city',["value"=>$city]);
echo $this->form->input('mobile',["value"=>$mobile]);
echo $this->Form->button('Edit');
echo $this->Form->end();
?>
