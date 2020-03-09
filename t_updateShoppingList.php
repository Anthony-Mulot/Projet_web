<?php

session_start();

include_once('bdd.php');
include_once('Ingredient.php');

$ingredient = new Ingredient();

$ingredient->updateShoppingList($_GET['ingredient'], $_GET['quantity'], $_SESSION['id']);

header('Location: shoppinglist.php');

?>

