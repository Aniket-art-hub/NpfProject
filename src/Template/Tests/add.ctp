<h1>Add post</h1>



<?= $this->Form->create(); ?>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'Name :']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'Email :']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('password', ['class' => 'form-control', 'label' => 'Password :']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('class', ['class' => 'form-control', 'label' => 'class']) ?>
    </div>
   
</div>

<div class="submit">
    <input class="btn btn-primary" type="submit" value="Submit">
</div>
<?= $this->Form->end(); ?>
