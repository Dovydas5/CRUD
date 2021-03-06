<?php
include_once 'db.php';

function getAllProjects(PDO $conn): array
{
    $sql = "SELECT * FROM project";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllEmployees(PDO $conn): array
{
    $sql = "SELECT * FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
