<?php
  include "GestionProject.php";

if(isset($_GET['Id_Project'])){

    // Trouver tous les employés depuis la base de données 
    $gestionProject= new GestionProject();
    $id = $_GET['Id_Project'] ;
    $gestionProject->Supprimer($id);
        
    header('Location: index.php');
}
?>