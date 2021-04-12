<!DOCTYPE html>
<html>
<body>
<h2 style="margin-left:40%; margin-top:0px;"><b>All Course Details</b></h2>
<table style="border:4px #116d76 solid;">
<tr>
<th>ID</th>
<th>Course</th>

</tr>
<?php
foreach ($results as $row)
{
  ?>
  
<tr>
  <td><?php echo $row->id; ?></td>
<td><?php echo $row->course; ?></td>

<?php
};
?>

</table>
</body>
<!-- <footer>
<ul class="pagination" style="margin-left:40%;">
<?= $this->Paginator->prev("<<") ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next(">>") ?>
</ul>
</footer> -->
</html>