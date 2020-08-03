<?php require 'db.php';

$msg = "";
if(isset($_POST['name'])){

    $name = $_POST['name'];
    $project = $_POST['project'] ? (int) $_POST['project']: null;
    $sql = 'INSERT INTO user(name, project_id) VALUES (:name, :project_id)';
    $stmt = $conn->prepare($sql);
    if( $stmt->execute(['name' => $name, 'project_id'=> $project])){
        $msg = "Inserted successfully";
    }
}
if(isset($_POST['projectName'])){

    $projectName = $_POST['projectName'];
    $sql = 'INSERT INTO project(project_name) VALUES (:projectName)';
    $stmt = $conn->prepare($sql);
    try {
        if( $stmt->execute(['projectName' => $projectName])){
            $msg = "Inserted successfully";
        }

    }catch (PDOException $exception){
        echo $exception->getMessage();
    }
}



