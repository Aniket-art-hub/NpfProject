<span style="margin-left:39%; font-size:25px; margin-top:20px;">Permission Pages </span>
<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"getdata"])."'><button style='background:green; margin-left:25%; margin-top:20px;'>Back</button></a>";?>

<div class="users form" style="width:150px; height:200px; margin-left:40%">
  <?php echo $this->Form->create('permissions',array("action"=>'updatepermission/'.$userid)); ?>

<?php $permission = ['0'=>'0','1'=>'1'];?>
        <?php  echo $this->Form->control('edit', ['options'=>$permission, 'label'=>"Edit",'value'=>$edit]); 

         echo $this->Form->control('remove', ['options'=>$permission, 'label'=>"Delete",'value'=>$remove]); 
   
        echo $this->Form->control('view', ['options'=>$permission, 'label'=>"View",'value'=>$view]); ?>
             
    <?php echo $this->Form->control('userid',['value'=>$userid,'type'=>'hidden']);  ?>

<div class="submit"style="margin-left:20%;">
    <input class="btn btn-primary" type="submit" value="Permission">
</div>
  <?php echo $this->Form->end();?>      

</div>