<!DOCTYPE html>
<html>
<head>

   
</head>
<body>
<?php echo "<a href='".$this->Url->build(["controller" => "Users","action"=>"getdata"])."'><button style='background:green; margin-left:10px;margin-top:10px;'>Exit</button></a>";?>

<span style="margin-left:30%; font-size:25px;"><b>Permissions Acc/to Users Role</b></span>
<table style="border:4px green solid;" >

<tr>
<th>Sno</th>
<th>Roles</th>
<th>Permissions</th>
</tr>

<tr style="border:1px green solid;">
<td>1</td>
<td>Admin</td>
<td>All permissions</td>
</tr>
<tr style="border:1px green solid;">
<td>2</td>
<td>Sale</td>
<td>Edit</td>
</tr>
<tr style="border:1px green solid;">
<td>3</td>
<td>Operation</td>
<td>Edit,
Delete</td>
</tr>
<tr style="border:1px green solid;">
<td>4</td>
<td>Viewer</td>
<td>View only</td>
</tr>
</table>
</body>

</html>
