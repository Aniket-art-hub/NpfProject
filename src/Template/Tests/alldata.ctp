
<h1>All data</h1>

<?php echo "<td><button style='margin-left:90%;'><a href = '".$this->Url->build (["controller" => "Users","action"=>"logout"])."'>Logout</a></button>"; ?>
<table class="table table-striped">
    <thead style="background:red;">
        <tr>
            <th><h5>ID</h5></th>
            <th><h5>Name</h5></th>
            <th><h5>Email</h5></th>
            <th><h5>Password</h5></th>
            <th><h5>Class</h5></th>
            <th><h5>Actions</h5></th>
        </tr>
    </thead>
    <tbody style="background:grey;">
        <?php foreach ($test as $all): ?>
            <tr>
                <td><?= $all->id ?></td>
                <td><?= $all->name ?></td>
                <td><?= $all->email ?></td>
                <td><?= $all->password ?></td>
                <td><?= $all->course ?></td>
                <?php //if($all->id!=20) { ?>
                <?php echo "<td><button><a href = '".$this->Url->build (["controller" => "Tests","action"=>"edit",$all->id])."'>Edit</a></button>"; ?>
<?php echo "<button><a href = '".$this->Url->build (["controller" => "Tests","action"=>"delete",$all->id])."'>delete</a></button></td>"; ?>
<?php// } ?>
               
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<footer>
<ul class="pagination" style="margin-left:40%;">
<?= $this->Paginator->prev("<<") ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next(">>") ?>
</ul>
</footer>

