<?php include_once '../includes/actions.php';?>

<?php
$sql = "SELECT * FROM projects";

$stmt = $conn->prepare($sql);
$stmt->execute();
$project = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once '../includes/head.php'?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Projects</h2>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <th>Project name</th>
                        <th>Employee</th>
                        <th>Action</th>

                    </tr>
                    <?php foreach($project as $projects):?>

                        <tr>
                            <td><?php echo $projects['id'];?></td>
                            <td><?php echo $projects['proj_name'];?></td>
                            <td><?php echo $person['name'];?></td>

                            <td>
                                <a href="edit.php?id=<?php echo $projects['id'];?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?id=<?php echo $projects['id'];?>" class="btn btn-danger">Delete</a>
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
                            <label for="name">Project</label>
                            <input value="<?= $person['project']; ?>" type="text" name="projectName" id="project" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php'?>
