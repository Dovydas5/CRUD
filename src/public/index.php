<?php include_once '../includes/actions.php';?>

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
                <div class="card-body">
                    <?php if(!empty($msg)):?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $msg ?>
                        </div>
                    <?php endif;?>
                    <form method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Project</label>
                            <input  type="text" name="project" id="project" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php'?>
