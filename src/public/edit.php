<?php
require '../includes/db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM people WHERE id=:id';
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id ]);
$person = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset ($_POST['name'])  && isset($_POST['project']) ) {
    $name = $_POST['name'];
    $project = $_POST['project'];
    $sql = 'UPDATE people SET name=:name, project=:project WHERE id=:id';
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([':name' => $name, ':project' => $project, ':id' => $id])) {
        header("Location: /");
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
                        <label for="project">Email</label>
                        <input value="<?= $person['project']; ?>" name="project" id="project" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update person</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require '../includes/footer.php'; ?>