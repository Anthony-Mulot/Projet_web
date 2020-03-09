<?php

session_start();

include_once('bdd.php');
include_once('Ingredient.php');

$ingredient = new Ingredient();
$ingredient->removeShoppingList($_GET['ingredient'], $_SESSION['id']);

header('Location: shoppinglist.php');

?>

