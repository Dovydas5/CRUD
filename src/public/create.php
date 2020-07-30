<?php
include_once '../includes/db.php';

$msg = "";
if(isset($_POST['name']) && isset($_POST['project'])){

    $name = $_POST['name'];
    $project = $_POST['project'];
    $sql = 'INSERT INTO people(name,project) VALUES (:name, :project)';
    $stmt = $conn->prepare($sql);
    if( $stmt->execute(['name' => $name, 'project' => $project])){
        $msg = "Inserted successfully";
    }
}
?>
<?php include_once '../includes/head.php' ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Create a person</h2>
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
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Project</label>
                    <input type="text" name="project" id="project" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create new person</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php' ?>
