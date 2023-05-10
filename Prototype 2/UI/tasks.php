<?php
include "../managers/GestionTask.php";
$id = $_GET['id'];
// Trouver tous les employés depuis la base de données 
$GestionTask = new GestionTask();
$tasks = $GestionTask->RechercherTous($id);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/file.css">
    <title>Gestion des employés</title>
</head>

<body>
    <div>
        <a href="./ajouteTask.php?id=<?php echo $id ?>">Ajouter un Task</a>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($tasks as $task) {
            ?>
                <tr>
                    <td>
                        <a href="./UI/tasks.php?id=<?php echo $task->getId() ?>">
                            <?= $task->getNom() ?>
                        </a>
                    </td>
                    <td>
                        <?= $task->getDescription() ?>
                    </td>
                    <td>
                        <a href="./UI/edit.php?Id_Project=<?php echo $task->getId() ?>">Éditer</a>
                        <a href="./UI/delet.php?Id_Project=<?php echo $task->getId() ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="../index.php">Annuler</a>
    </div>
</body>

</html>