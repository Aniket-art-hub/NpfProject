<!DOCTYPE html>
<html>
<body>
  <?php foreach($results as $row); {      ?>
  <div style=" margin-left:87%">
<?php echo "<td><a href = '".$this->Url->build (["controller" => "Alls","action"=>"check",$row->id])."'><button >Add Users</button></a></td>"; ?>
<?php echo "<td><a href = '".$this->Url->build (["controller" => "users","action"=>"logout",$row->id])."'><button >Logout</button></a></td>"; ?>
</div>
<?php }; ?>
<h2 style="margin-left:40%; margin-top:-65px;"><b>Users List</b></h2>
<table style="border:4px #116d76 solid;">
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>City</th>
<th>mobile</th>
<th>Edit</th>
<th>Delete</th>

</tr>
<?php
foreach ($results as $row)
{
  ?>
  
<tr>
  <td><?php echo $row->id; ?></td>
<td><?php echo $row->first_name; ?></td>
 <td><?php echo $row->last_name;?> </td>
<td><?php echo $row->email;?> </td>
<td><?php echo $row->city;?> </td>
<td><?php echo $row->mobile;?> </td>

<?php echo "<td><a href = '".$this->Url->build (["controller" => "Alls","action"=>"edit",$row->id])."'>Edit</a></td>"; ?>
<?php echo "<td><a href = '".$this->Url->build (["controller" => "Alls","action"=>"delete",$row->id])."'>delete</a></td>"; ?>


<?php
};
?>

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