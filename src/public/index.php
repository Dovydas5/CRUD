<?php include_once '../includes/db.php';?>

<?php
$sql = "SELECT * FROM people";
$stmt = $conn->prepare($sql);
$stmt->execute();
$people = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once '../includes/head.php'?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Employees</h2>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>project</th>
                        <th>Action</th>

                    </tr>
                    <?php foreach($people as $person):?>

                    <tr>
                        <td><?php echo $person['id'];?></td>
                        <td><?php echo $person['name'];?></td>
                        <td><?php echo $person['project'];?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $person['id'];?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $person['id'];?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                    <?php endforeach;?>

                </table>
                <a class="btn btn-primary" href="create.php">Create New employee</a>

            </div>
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php'?>
