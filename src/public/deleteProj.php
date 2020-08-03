<?php
require '../includes/db.php';

$id = $_GET['id'];
$sql = "DELETE FROM project WHERE id = :id";
$stmt = $conn->prepare($sql);
if($stmt->execute([':id' => $id])){
    header("Location: projects.php");
}