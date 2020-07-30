<?php
include_once '../includes/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM people WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$person = $stmt->fetch(PDO::FETCH_OBJ);

if(isset($_POST['name']) && isset($_POST['project'])){
    $name = $_POST['name'];
    $project = $_POST['project'];
    $sql = 'UPDATE people set name=:name, project=:project WHERE id=:id' ;
    $stmt = $conn->prepare($sql);
    var_dump($stmt);
    if( $stmt->execute(['name' => $name, 'project' => $project, 'id' => $id])){
        header("Location: index.php");
    }
}
?>
<?php include_once '../includes/head.php'?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Update employee</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($msg)):?>
                <div class="alert alert-success" role="alert">
                    <?php echo $msg ?>
                </div>
            <?php endif;?>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value= "<?php echo $person->name;?>"type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Project</label>
                    <input type="text" <?php echo $person->project;?>name="project" id="project" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update employee</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php'?>
