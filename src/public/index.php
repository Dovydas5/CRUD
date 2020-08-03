<?php
include_once '../includes/actions.php';
include_once '../includes/functions.php';


$sql = '
    SELECT
        u.*,
        p.project_name AS "project"
    FROM user u
        LEFT JOIN project p
            ON u.project_id = p.id
    ORDER BY u.id ASC
';
$stmt = $conn->prepare($sql);
$stmt->execute();
$people = $stmt->fetchAll(PDO::FETCH_ASSOC);
$projects = getAllProjects($conn);
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
                            <label for="name">Employer name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="project">Project</label>
                            <select name="project" class="custom-select">
                                <option value="">Select project</option>
                                <?php foreach ($projects as $project):?>
                                <option value="<?php echo $project['id'];?>"><?php echo $project['project_name'];?></option>
                                <?php endforeach;?>
                            </select>
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
