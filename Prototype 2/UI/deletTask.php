<?php

include "../Managers/GestionProject.php";
if (file_exists('./managers/GestionTask.php')) {
	include './managers/GestionTask.php';
} elseif (file_exists('../managers/GestionTask.php')) {
	include '../managers/GestionTask.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}

if(isset($_GET['Id_Task'])){

    // Trouver tous les employés depuis la base de données 
    $GestionTask= new GestionTask();
    $id = $_GET['Id_Task'] ;
    $GestionTask->Supprimer($id);
        
    header("Location: tasks.php?id=".$id);
}

