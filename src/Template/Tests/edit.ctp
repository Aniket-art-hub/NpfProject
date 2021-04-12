<h1>Edit post</h1>
<?= $this->Form->create('tests',array('action'=>'edit/'.$id)); ?>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'Name ','value'=>$name]) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'email','value'=>$email]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('password', ['class' => 'form-control', 'label' => 'password','value'=>$password]) ?>
    </div>
    
</div>

<div class="submit">
    <input class="btn btn-primary" type="submit" value="Edit">
</div>
<?= $this->Form->end(); ?>
