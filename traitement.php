<?php
include_once("User.php");
include_once('bdd.php');
$test = new user();


if(isset($_POST["valider"])) //inscription
{
	if(!empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["email"]))
	{
		$req=$test->inscription($_POST["login"], $_POST["password"], $_POST["email"]);
        header('location: index.php');
	}
	else
	{
		header('location: inscription.php');
	}
	
}

if(isset($_POST["validation"])) //Connection
{

	if(!empty($_POST["password"]) && !empty($_POST["email"]))
	{
		$test->connection($_POST["password"], $_POST["email"]);
		header('Location:index.php');
	}
	else
	{
		header('location: connect.php');
	}
}


?>
