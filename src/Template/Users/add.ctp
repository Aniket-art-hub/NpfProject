<!doctype html>
<html>
<head>
</head>
<body style="">

<span style="margin-left:40%;font-size:25px;">User Registration Form</span>
<div class="users form" style="width:400px; min-height:200px; margin-left:35%">
<?= $this->Form->create()  ?>
<?= $this->Form->control('username')  ?>
<?= $this->Form->control('useremail')  ?>
<?= $this->Form->control('password',['class' => 'form-control', 'label' => 'password','type'=>'password'])  ?>
 <?php $designation = ['software Devloper'=>'software Devloper','Team Leader'=>'Team Leader','Trainee'=>'Trainee ','Product Manager'=>'Product Manager'];?>
<?php  echo $this->Form->control('designation', ['options'=>$designation, 'label'=>"Designation", ]); ?>

<?= $this->Form->control('address1',['type'=>'textarea'])  ?>
<?= $this->Form->control('address2',['type'=>'textarea'])  ?>
<?= $this->Form->control('pincode')  ?>
 <?php $role = ['Admin'=>'Admin','Sales'=>'Sales','Operation'=>'Operation ','Viewer'=>'Viewer'];?>
 <?php  echo $this->Form->control('role', ['options'=>$role, 'label'=>"Role", ]); ?>

<div class="submit" style="margin-left:45%;">
    <input class="btn btn-primary" type="submit" value="Submit">
</div>
<?= $this->Form->end()  ?>
<!-- <div style="margin-left:80%;">
<?php //echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"getdata"])."'><button style='background:green;'>Cancel</button></a>";?></div>
</div> -->
</body>
</html>