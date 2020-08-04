<?php
require '../includes/functions.php';

$persons= getAllEmployees($conn);
$projects=getAllProjects($conn);

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
    $sql = 'UPDATE project SET project_name=:name WHERE id=:id ';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([':name' => $name, ':id' => $id])) {
        header("Location: index.php");
    }
}
?>
<?php require '../includes/head.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update project</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">

                    <div class="form-group">
                        <label for="project">Employee</label>
                        <select name="project" class="custom-select">
                            <option value="">Select employee</option>
                            <?php foreach ($persons as $person):?>
                                <option  value="<?php echo $project['id'];?>"<?php echo $project['id'] === $person['project_id']? 'selected': '' ?>><?php echo $person['name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="form-group">
                            <label for="name">Project Name</label>
                            <input value="<?php echo $project['project_name']; ?>" type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require '../includes/footer.php'; ?>