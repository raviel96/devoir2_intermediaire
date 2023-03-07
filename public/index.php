<?php 
$pdo = require_once '../fonctions/connexion.php';

$sql = "SELECT produit_id, produit_nom, produit_prix FROM produits";

$statement = $pdo->prepare($sql);

$statement->execute();

$products = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="">Produits</h1>
        <ul class="list-group list-group-horizontal ">
            <?php foreach($products as $value) :?>
                <li class="list-group-item d-flex flex-column align-items-center">
                    <p><?php echo $value['produit_nom'];?></p>
                    <p><?php echo $value['produit_prix'];?>€</p>
                    <a class="btn btn-primary" href="../fonctions/addition.php?produit_id=<?php echo $value['produit_id']?>" >Ajouter au panier</a>
                </li>
            <?php endforeach;?>
        </ul>
        <a class="my-3 fs-3 btn btn-success" href="panier.php">Panier</a>
    </div>
</body>
</html>