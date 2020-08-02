<?php
include_once 'db.php';
// Create new employee
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

//Update

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
