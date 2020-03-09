<?php

session_start();

include_once('bdd.php');
include_once('Recette.php');

$recipe = new Recette();

$article_id = $_GET['id'];
$user_id = $_SESSION['id'];

if ($recipe->isFavorite($_GET['id'], $_SESSION['id']) == FALSE)
{
	$recipe->addFavorite($_GET['id'], $_SESSION['id']);
}
else if ($recipe->isFavorite($_GET['id'], $_SESSION['id']) == TRUE)
{
	$recipe->removeFavorite($_GET['id'], $_SESSION['id']	);
}

//TODO : Renvoyer à la page appropriée
//header('Location: show_articles.php#' . $article_id );
header('Location: allRecette.php');

?>

