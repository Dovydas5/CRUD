<?php
require 'db.php';


function employeeRead($conn)
{
    $sql = "SELECT * FROM people";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $people = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($people as $person) {

        print '<tr>';
        print '<td>' . $person['id'] . '</td>';
        print '<td>' . $person['name'] . '</td>';
        print '<td>' . $person['project'] . '</td>';
        print '<td>';
        print '<a class="btn btn-danger" href="edit.php?id="' . $person['id'] . '>Edit</a>';
        print '<a class="btn btn-danger" href="delete.php?id="' . $person['id'] . '>Delete</a>';
        print '</td>';
        print '</tr>';
    }
}

function projectRead($conn)
{
    $sql = "SELECT * FROM projects";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $project = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($project as $projects) {

        print '<tr>';
        print '<td>' . $projects['id'] . '</td>';
        print '<td>' . $projects['proj_name'] . '</td>';
        print '<td>';
        print '<a class="btn btn-danger" href="edit.php?id="' . $projects['id'] . '>Edit</a>';
        print '<a class="btn btn-danger" href="delete.php?id="' . $projects['id'] . '>Delete</a>';
        print '</td>';
        print '</tr>';
    }
}

?>
