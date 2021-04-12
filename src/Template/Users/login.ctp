
<body style="background:green;">
<div class="users form" style="background:green; width:500px; margin-left:35%; margin-top:100px;">
	<h3 style="margin-left:35%;">Login Page</h3>
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and userpassword') ?></legend>
       <span style="color:white;"> <?= $this->Form->control('username') ?></span>
       <span style="color:white;"> <?= $this->Form->control('password',['class' => 'form-control', 'label' => 'password','type'=>'password']) ?>
</span>    </fieldset>
<div style="margin-right:40%;">
<?= $this->Form->button(__('Login')); ?>
	
</div>
<?= $this->Form->end() ?>
</div>
</body>
