<?php include_once '../includes/actions.php';?>
<?php include_once '../includes/functions.php';?>


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
            <h2>Employees</h2>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>id</th>
                        <th>Project name</th>
                        <th>Employee</th>
                        <th>Action</th>

                    </tr>
                    <?php projectRead($conn)?>

                </table>
                <a class="btn btn-primary" href="create.php">Create New employee</a>

            </div>
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php'?>
