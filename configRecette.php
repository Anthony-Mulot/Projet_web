<?php 
include_once('Recette.php');
include_once('User.php');

if(session_id()==""){
	session_start();
}


	if(isset($_POST['ajouter'])) {

		$objetrecette = new Recette();	

		if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['image']) && !empty($_POST['duree']) && !empty($_POST['persons']) && !empty($_POST['ingredient']) && !empty($_POST['quantity'])) {
					
				$title = $_POST['title'];
				$all = $_POST['content'];
				$image = $_FILES['image'];
			 	$titre = $_POST['title'];
			 	$duree = $_POST['duree'];
			 	$number = $_POST['persons'];
				$uploadDir = __DIR__ . '\\img\\';
				$user = $_SESSION['id'];
				$ingredient = $_POST['ingredient'];
				$quantity = $_POST['quantity'];
			}
		    
		    $extension = pathinfo($_FILES['image']['name'])['extension'];
            $image = $titre . '.' . $extension;
            
		     if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$image))
		    {
				$recipe = $objetrecette->postrecette($title,$all,$image,$duree,$number,$user);
				$reqrecipe = $objetrecette->postallinfo($recipe,$ingredient,$quantity);
				header('location:index.php');
			}
		}else{
				echo "nope";
			}


?>