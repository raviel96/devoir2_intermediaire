<?php 
$pdo = require_once '../fonctions/connexion.php';

$sql = "SELECT a.produit_id, produit_nom, produit_prix
        FROM panier a
        JOIN produits p
        ON p.produit_id = a.produit_id
        GROUP BY p.produit_id";

$statement = $pdo->prepare($sql);
$statement->execute();

$result = $statement->fetchAll();

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
    <h1 class="mb-4">Mon panier</h1>
    <ul class="list-group list-group-horizontal">
        <?php foreach($result as $value) :?>
            <li class="list-group-item d-flex flex-column align-items-center">
                <p class="fs-4"><?php echo $value['produit_nom'];?></p>
                <p class="fs-5"><?php echo $value['produit_prix'];?>€</p>
            </li>
        <?php endforeach;?>
    </ul>
    <a class="btn btn-primary my-4" href="index.php">Retour à l'accueil</a>
    </div>
</body>
</html>