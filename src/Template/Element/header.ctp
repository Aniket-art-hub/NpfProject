<html>
<body>
<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            
        </ul>
        <div style="margin-top:10px;">
            
        <?php if($Auth->user('role')=='Admin') { ?>



<?php } elseif ($Auth->user('user_id') && ($Auth->user('edit') && $Auth->user('remove')&&$Auth->user('view'))=='1') { ?>

<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"edit",$Auth->user('user_id')])."'><button style=' margin-left:30px;'>Edit</button></a>";?>
<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"delete",$Auth->user('user_id')])."'><button style='margin-left:30px;'>Delete</button></a>";?>
<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"readdata",$Auth->user('user_id')])."'><button style=' margin-left:30px;'>View</button></a>";?>

<?php } elseif (($Auth->user('edit') && $Auth->user('remove')) =='1') { ?>  

<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"edit",$Auth->user('user_id')])."'><button style=' margin-left:30px;'>Edit</button></a>";?>
<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"delete",$Auth->user('user_id')])."'><button style=' margin-left:30px;'>Delete</button></a>";?>

<?php } elseif (($Auth->user('remove') && $Auth->user('view'))=='1') { ?>

<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"delete",$Auth->user('user_id')])."'><button style='margin-left:30px;'>Delete</button></a>";?>
<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"readdata",$Auth->user('user_id')])."'><button style=' margin-left:30px;'>View</button></a>";?>

<?php  } elseif (($Auth->user('edit') && $Auth->user('view'))=='1') { ?>

<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"edit",$Auth->user('user_id')])."'><button style=' margin-left:30px;'>Edit</button></a>";?>
<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"readdata",$Auth->user('user_id')])."'><button style=' margin-left:30px;'>View</button></a>";?>

<?php } elseif ($Auth->user('edit')=='1') { ?> 

<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"edit",$Auth->user('user_id')])."'><button style=' margin-left:30px;'>Edit</button></a>";?>
<?php } elseif ($Auth->user('remove')=='1') { ?> 
<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"delete",$Auth->user('user_id')])."'><button style=' margin-left:30px;'>Delete</button></a>";?>
<?php } elseif ($Auth->user('view')=='1') { ?> 
<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"readdata",$Auth->user('user_id')])."'><button  margin-left:30px;'>View</button></a>";?>

<?php }  else{

} ?></div>

        
                    <div style="margin-left:35%; margin-top:-20px;"><b>Welcome:-
    <?php 
    if ($Auth->user()) {
        echo ($Auth->user('useremail'));

    } ?></b></div>
    <div class="top-bar-section" style="margin-top:-38px;" >
            <ul class="right">
                <li>
    <?php
        $this->Breadcrumbs->add([
       ['title' => 'Back', 'url' => ['controller' => 'users', 'action' => 'getdata']] ]);?>
        
           <?php
           if ($Auth->user('role')=='Admin') {
        $this->Breadcrumbs->add([               
    ['title' => '+AddUser ', 'url' => ['controller' => 'users', 'action' => 'add']] ]); }?>
        <?php
        $this->Breadcrumbs->add([
    ['title' => 'RolePermission', 'url' => ['controller' => 'users', 'action' => 'rolespermission']] ,
    ['title' => 'Logout', 'url' => ['controller' => 'users', 'action' => 'logout']]
]);  

echo $this->Breadcrumbs->render(
    ['class' => 'breadcrumbs-trail'],
    ['separator' => '<i class="fa fa-angle-right"></i>']
);
$this->Breadcrumbs->templates([
    'wrapper' => '<nav class="breadcrumbs"><ul{{attrs}}>{{content}}</ul></nav>',

    'item' => '<li{{attrs}}><a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}'
]);

?></li>
            </ul>
        </div>
    </nav>

</body>
</html>