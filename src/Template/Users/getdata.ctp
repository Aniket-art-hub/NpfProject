<!DOCTYPE html>
<html>
<head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script> 
</head>
<body>

<!--  /*echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"permission"])."'><button type='button' style='margin-left:5%; margin-top:20px; background:green;'>Add Permission</button></a>";*/  }?> -->



<!-- permission page button -->


<!-- permission page end -->


<h2 style="margin-left:40%; margin-top:10px;"><b>Users Data</b></h2>

<table style="border:4px #116d76 solid;" class="dataget" >
<?php if ($Auth->user('user_id')==1) { ?>	
<div style="width:400px; margin-left:35%;"><?=  $this->Form->control('search')  ?>
</div> 
<?php } ?>
<tr>
<th>User_id</th>
<th>username</th>
<!-- <th>useremail</th>
<th>userpassword</th>
<th>designation</th>
<th>address1</th>
<th>address2</th>
<th>pincode</th> -->
<th>role</th>
<div ><th>Action</th></div>

</tr>
<?php
foreach ($data as $row)
{
 ?>
<tr>
<td><?php echo $row->user_id; ?></td>
<td><?php echo $row->username; ?></td>
<!-- <td><?php //echo $row->useremail; ?></td>
<td><?php //echo $row->password; ?></td>
<td><?php// echo $row->designation; ?></td>
<td><?php //echo $row->address1; ?></td>
<td><?php //echo $row->address2; ?></td>
<td><?php //echo $row->pincode; ?></td> -->
<td><?php echo $row->role; ?></td>

<?php if ($Auth->user('role')=='Admin') { ?>
<td><?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"readdata",$row->user_id])."'>View</a>";?>-
<?php echo "<a href = '".$this->Url->build (["controller" => "Users","action"=>"edit",$row->user_id])."'>Edit</a>"; ?>-
<?php echo "<a href='".$this->Url->build(["controller"=>"Users","action"=>"delete",$row->user_id])."'>Delete</a>";?>-
<?php echo "<a href='".$this->Url->build(["controller"=>"users","action"=>"permission",$row->user_id])."'>AddPermission</a>";?>

</td>
<?php }?>


<?php if($row->role=="Viewer" && $Auth->user('role')!='Admin') { ?>
<td><?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"readdata",$row->user_id])."'>View</a>";?></td>


<?php } else if($row->role=="Sales"  && $Auth->user('role')!='Admin')  { ?>
	<td><?php echo "<a href = '".$this->Url->build (["controller" => "Users","action"=>"edit",$row->user_id])."'>Edit</a>"; ?></td>

<?php } else if($row->role=="Operation"  && $Auth->user('role')!='Admin') {  ?>
<td><?php echo "<a href = '".$this->Url->build (["controller" => "Users","action"=>"edit",$row->user_id])."'>Edit</a>"; ?>-
<?php echo "<a href='".$this->Url->build(["controller"=>"Users","action"=>"delete",$row->user_id])."'>Delete</a>";?></td>

</tr>
<?php
} }  ?>

</table>
</body>
<footer>
<ul class="pagination" style="margin-left:40%;">
<?= $this->Paginator->prev("<<") ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next(">>") ?>
</ul>
</footer>

</html>
<script>
$('document').ready(function(){
	$('#search').keyup(function(){
		var searchkey=$(this).val();
		searchUsers(searchkey);
	});

	function searchUsers(keyword)
	{
		var data=keyword;
		$.ajax({
		method:'get',
		url:'<?php echo $this->Url->build(["controller"=>"Users","action"=>"search"]);?>', 
		data:{keyword:data},
		success:function(response)
		{
			$('.dataget').html(response);
		}

		});
	};
});


</script>