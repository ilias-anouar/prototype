<?php
// define('__ROOT__', dirname(dirname(__FILE__)));
include "./managers/GestionClient.php";

// Trouver tous les employés depuis la base de données 
$GestionClient = new GestionClient();
$Clients = $GestionClient->AllClientData();
?>

<?php
$pageId = isset($_GET['pageId']) ? $_GET['pageId'] : 1;

$itemsPerPage = 6; 

$endIndex = $pageId * $itemsPerPage;
$startIndex = $endIndex - $itemsPerPage;

$sql = "SELECT * FROM `client` LIMIT $startIndex, $itemsPerPage"; 

$result = $conn->query('SELECT COUNT(*) FROM client');
$totalServices = $result->fetch_row()[0]; // 

$pagesNum = ceil($totalServices / $itemsPerPage);

$services = [];
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
    $result->free();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./UI/style/file.css">
    <title>Gestion des CLients</title>
</head>

<body>
    <div>

    <div class="input-group ">
        <input type="search" class="form-control-sm rounded " id="holder" placeholder="Search" aria-label="Search" aria-describedby="search-addon" >
      </div>
        <a class="btn btn-primary" href="./UI/Ajoute.php">Ajouter un Client</a>

        <table class="table table-success table-striped table-hover">
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($Clients as $Client) {
            ?>
                <tr>
                    <td>

                        <?= $Client->Getnom()?>

                    </td>
                    <td>
                        <?= $Client->Getemail() ?>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="./UI/edit.php?Id_client=<?php echo $Client->GetID() ?>">Éditer</a>
                      <a  class="btn btn-warning" href="./UI/delet.php?Id_client=<?php echo $Client->GetID() ?>">delet</a>
                        <a  class="btn btn-info" href="./UI/Services.php?id=<?php echo $Client->GetID() ?>">
                           Services
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<script>
    <?php 
    include "./UI/js/script.js";

   
   ?>
   </script>
</body>

<?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
    <nav class="mt-5 mb-5 " aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $pagesNum; $i++) { ?>
                <li class="page-item"><a class="page-link" href="<?php echo "index.php?pageId=" . $i ?>"><?php echo $i; ?></a></li>
            <?php } ?>
        </ul>
    </nav>
<?php } ?>
</html>