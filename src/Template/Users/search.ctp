<!DOCTYPE html>
<html>
<head>

	 
</head>
<body>
<table style="border:4px #116d76 solid;" >

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
foreach ($Users as $row)
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
<?php echo "<a href='".$this->Url->build(["controller"=>"Users","action"=>"permission",$row->user_id])."'>Permission</a>";?></td>
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


</html>
