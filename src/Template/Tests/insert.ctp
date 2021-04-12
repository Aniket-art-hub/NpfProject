<h1>Add post</h1>



<?= $this->Form->create(); ?>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('first_name', ['class' => 'form-control', 'label' => 'Firstname :']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('last_name', ['class' => 'form-control', 'label' => 'Lastname :']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('email', ['class' => 'form-control', 'label' => 'Email :']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('city', ['class' => 'form-control', 'label' => 'City :']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('mobile', ['class' => 'form-control', 'label' => 'Mobile :']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('password', ['class' => 'form-control', 'label' => 'Password :']) ?>
    </div>
   
</div>

<div class="submit">
    <input class="btn btn-primary" type="submit" value="Submit">
</div>
<?= $this->Form->end(); ?>
