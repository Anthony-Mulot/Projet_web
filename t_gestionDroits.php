<?php
include_once("User.php");
include_once('bdd.php');

$user = new User();
$id = $_GET['id'];
$bdd = new Bdd();

//Ajoute les droits administrateur à l'utilisateur
if ($user->isAdmin($id) == FALSE)
{
    $user->setAdmin($id);
}
//Enlève les droits administrateur de l'admin
else if ($user->isAdmin($id) == TRUE)
{
    $user->removeAdmin($id);
}

header('Location: gestionDroitsAdmin.php#' . $id);

?>