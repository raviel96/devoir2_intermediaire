<?php 
$pdo = require_once '../fonctions/connexion.php';

$sql = "SELECT produit_nom, produit_prix FROM produits";

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
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Produits</h1>
        <ul>
            <?php foreach($products as $value) :?>
                <li>
                    <a href=""><?php echo $value['produit_nom'];?></a>
                    <p><?php echo $value['produit_prix'];?>€</p></li>
            <?php endforeach;?>
        </ul>
        
    </div>
</body>
</html>