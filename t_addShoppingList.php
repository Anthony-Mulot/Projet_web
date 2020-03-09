<?php

session_start();

include_once('bdd.php');
include_once('Ingredient.php');

$ingr = new Ingredient();
$tab2 = $_POST['quantity'];
$i = 0;
foreach($_POST['ingredient'] as $tab)
{
    if ($ingr->isShoppingList($tab, $_SESSION['id']) == FALSE){
        $ingr->addShoppingList($tab, $_SESSION['id'], $tab2[$i]);
    }
    $i++;
}

header('Location: shoppinglist.php');

?>

