<?php require 'db.php';

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
if(isset($_POST['projectName'])){

    $projectName = $_POST['projectName'];
    $sql = 'INSERT INTO projects(proj_name) VALUES (:projectName)';
    $stmt = $conn->prepare($sql);
    if( $stmt->execute(['projectName' => $projectName])){
        $msg = "Inserted successfully";
    }
}



