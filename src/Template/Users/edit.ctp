<h1 style="margin-left:40%;">Edit post</h1>
<div class="users form" style="width:370px; min-height:200px; margin-left:35%">
<?php echo $this->Form->create('users',array("action"=>'edit/'.$id)); ?>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('username', ['class' => 'form-control', 'label' => 'username ','value'=>$username]) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('useremail', ['class' => 'form-control', 'label' => 'useremail','value'=>$useremail]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('password', ['class' => 'form-control', 'label' => 'password','value'=>$password]) ?>
    </div>
    <div class="col-md-6">
        <?php $designation = ['software Devloper'=>'software Devloper','project manager'=>'project manager','Human Resource'=>'Human Resource ','Product Manager'=>'Product Manager'];?>
        <?php  echo $this->Form->control('designation', ['options'=>$designation, 'label'=>"Designation",'value'=>$designation]); ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('address1', ['class' => 'form-control', 'label' => 'address1','value'=>$address1]) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('address2', ['class' => 'form-control', 'label' => 'address2','value'=>$address2]) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('pincode', ['class' => 'form-control', 'label' =>    'pincode','value'=>$pincode]) ?>
    </div>
    <?php if($Auth->user('role')=='Admin')  { ?>
    <?php $roles = ['Admin'=>'Admin','Sales'=>'Sales','Operation'=>'Operation ','Viewer'=>'Viewer'];?>
 <?php  echo $this->Form->control('role', ['options'=>$roles, 'label'=>"Role",'value'=>$role]); ?>
<?php } ?>
</div>

<div class="submit">
    <input class="btn btn-primary" type="submit" value="Edit">
</div>

<?= $this->Form->end(); ?>

</div>