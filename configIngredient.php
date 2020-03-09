<?php 
include_once('Ingredient.php');
include_once('User.php');

if(session_id()==""){
	session_start();
}
$test = new user();	

if(isset($_POST['addingredient'])) {

$objet = new Ingredient();
	if(!empty($_POST['name']) && !empty($_POST['unit'])) {
			$name = $_POST['name'];
			$unit = $_POST['unit'];
			$recuperation = $objet->postingredient($name, $unit);
			header('location:index.php');
			}
			else{
				echo "nope";
			}
			
}



?>