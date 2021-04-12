<!DOCTYPE html>
<html>
<body>
<h2 style="margin-left:40%; margin-top:0px;"><b>User Details</b></h2>
<table style="border:4px #116d76 solid;">
<tr>
<th>User_id</th>
<th>username</th>
<th>useremail</th>
<th>userpassword</th>
<th>designation</th>
<th>address1</th>
<th>address2</th>
<th>pincode</th>
<th>role</th>
<div style="margin-left:20px;"><th>Action</th></div>

</tr>
<?php
foreach ($data as $row)
{
  ?>
  
<tr>
<td><?php echo $row->user_id; ?></td>
<td><?php echo $row->username; ?></td>
<td><?php echo $row->useremail; ?></td>
<td><?php echo $row->password; ?></td>
<td><?php echo $row->designation; ?></td>
<td><?php echo $row->address1; ?></td>
<td><?php echo $row->address2; ?></td>
<td><?php echo $row->pincode; ?></td>
<td><?php echo $row->role; ?></td>
<td><?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"getdata"])."'><button style='background:green;'>Back</button></a>";?>

<?php
};
?>

</table>
</body>

</html>