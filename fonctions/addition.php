<?php 

$pdo = require_once '../fonctions/connexion.php';

if($_GET) {
    $produit_id = $_GET['produit_id'];
    $sql = "INSERT INTO panier(produit_id) 
            VALUES (:produit_id)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);
    $statement->execute();
    header("location:../public/index.php");
}

?>