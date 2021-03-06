<?php
require '../includes/functions.php';

$projects = getAllProjects($conn);
$id = $_GET['id'];
$sql = '
    SELECT u.*, p.project_name FROM user u
        LEFT JOIN project p
            ON u.project_id = p.id
        WHERE u.id=:id
';
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id ]);

$person = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset ($_POST['name'])  && isset($_POST['project']) ) {
    $name = $_POST['name'];
    $project = $_POST['project'] ? (int) $_POST['project']: null;
    $sql = 'UPDATE user SET name=:name, project_id=:project WHERE id=:id ';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([':name' => $name,':project'=>$project, ':id' => $id])) {
        header("Location: index.php");
    }
}
?>
<?php require '../includes/head.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update person</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="<?php echo $person['name']; ?>" type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="project">Project</label>
                        <select name="project" class="custom-select">
                            <option value="">Select project</option>
                            <?php foreach ($projects as $project):?>
                                <option  value="<?php echo $project['id'];?>"<?php echo $project['id'] === $person['project_id']? 'selected': '' ?>><?php echo $project['project_name'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update person</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require '../includes/footer.php'; ?>