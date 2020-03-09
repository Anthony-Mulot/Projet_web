<?php
include_once('Recette.php');
include_once('Ingredient.php');
include_once("User.php");

if(session_id()==""){
	session_start();
}

	if(isset($_POST['modifier']))

	{
		$objetrecette = new Recette();

		if(!empty($_POST["idRecipe"]) && !empty($_POST["oldIngredient"]) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['image']) && !empty($_POST['duree']) && !empty($_POST['persons']) && !empty($_POST['ingredient']) && !empty($_POST['quantity'])) {

            $idRecipe = $_POST['idRecipe'];
            $oldIngredient = $_POST['oldIngredient'];
            $title = $_POST['title'];
            $all = $_POST['content'];
            $image = $_FILES['image'];
            $titre = $_POST['title'];
			$duree = $_POST['duree'];
			$number = $_POST['persons'];
			$ingredient = $_POST['ingredient'];
			$quantity = $_POST['quantity'];
			$uploadDir = __DIR__ . '\\img\\';
		
			$extension = pathinfo($_FILES['image']['name'])['extension'];
            $image = $titre . '.' . $extension;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$image))
	    	{
	        	echo ("Image envoyée</br>");
	    	}
	    	
            
		}

        $newrecipe = $objetrecette->UpdateAllRecipeUser($title,$all,$image, $duree, $number, $ingredient, $quantity, $idRecipe, $oldIngredient);
        header('location: afficheRecette.php');

	}

?>