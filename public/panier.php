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
    <title>Document</title>
</head>
<body>
    <div class="container">
    <ul>
        <?php foreach($result as $value) :?>
            <li>
                <p><?php echo $value['produit_nom'];?></p>
                <p><?php echo $value['produit_prix'];?>€</p>
            </li>
        <?php endforeach;?>
    </ul>
    <a href="index.php">Retour à l'accueil</a>
    </div>
</body>
</html>