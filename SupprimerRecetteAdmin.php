<?php
include_once('Recette.php');
include_once('User.php');
include_once('bdd.php');

$bdd = new Bdd();

if(isset($_GET['recipe_id'])) {
	$test = $_GET['recipe_id'];
   	$a = $bdd->getBdd()->prepare("DELETE FROM recipeingredient WHERE recipeingredient.recipe=$test");
	$a->execute();
	$data = $bdd->getBdd()->prepare("DELETE FROM recipe WHERE recipe.id=$test");
   	$data->execute();
   	header('location:afficheRecetteAdmin.php');
}else{
	echo "nope";
}

?>