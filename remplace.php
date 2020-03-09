<?php
include_once("User.php");
session_start();
$test = new user();

	if(isset($_POST['login'])) //modification du login
	{
		$bdd = new Bdd();
		$data = $bdd->getBdd()->prepare('UPDATE user SET login = "' . $_POST['login']  . '" WHERE id = ' . $_SESSION["id"]); 
		$data->execute();
		header('Location:compte.php');
	}

	if(isset($_POST['email'])) //modification de l'email
	{
		$bdd = new Bdd();
		$data = $bdd->getBdd()->prepare('UPDATE user SET email = "' . $_POST['email'] .'" WHERE id = ' . $_SESSION["id"]); 
		$data->execute();
		header('Location:compte.php');
	}

		if(isset($_POST['password'])) { //modification du password
		$bdd = new Bdd();
		$password = hash("sha1", $_POST['password']);
		$data = $bdd->getBdd()->prepare('UPDATE user SET password= "' . $password  .'" WHERE id = ' . $_SESSION["id"]); 
		$data->execute();
		header('Location:compte.php');
	}


?>