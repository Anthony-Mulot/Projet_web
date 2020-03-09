<!DOCTYPE HTML>
<html lang="fr">
<head>
<?php

if(session_id()==""){
    session_start();
}
if(empty($_SESSION)) {
    header('location:index.php');
}


include_once("Ingredient.php");
include_once("Recette.php");

$newingredient = new Ingredient();
$getindredient = $newingredient->getallingredient('name');
$newrecette = new Recette();
$allrecette = $newrecette->getrecipeuser();


?>
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://kit.fontawesome.com/cd3053ba4f.js" crossorigin="anonymous"></script>
<title>Ajout de recette</title>
</head>
<body>
 

<div class="flex items-scretch h-full">
        <div id="navbar" class=" absolute md:static  md:h-auto w-full md:w-64 hidden md:block flex-initial">
            <div class="mt-16">
            <img src="img\unnamed.jpg" alt="" class="w-32 xl:h-32 mx-10 mb-8 mr-2 rounded-full ">
                    <a href="index.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4  p-1"><i class="fas pr-2 fa-bars"></i>Accueil du site</a>
                    <a href="ajoutIngredient.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-folder-plus"></i> Ajouter un ingredient</a>

                    <a href="gestiondroitsadmin.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-fw fa-user"></i>Gerer les droits utilisateurs</a>
                    <a href="afficheRecette.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-fw fa-clipboard-list"></i>Toutes les recettes</a>
                    <a href="compte.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1">Gerer le compte</a>
                    <a href="deconnection.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-sign-out-alt"></i>Se deconnecter</a>
  </div>
        </div>

        <div class="bg-gray-400 h-screen flex-auto px-5 py-12">
           
            <div class="max-w-3xl mx-auto">
                <h1 class="text-center font-calibri text-black text-4xl pb-4"><i class="far fa-edit"></i>Modifier une recette :</h1>
                <form class="w-full h-full pt-2" method="POST" action="update.php" enctype="multipart/form-data">
                    <?php 
                        foreach ($allrecette as $test) {
                        }

                       
                    ?>
                    <div class="flex mb-4 -mx-2">
                        <div class="w-1/2 px-3">
                            <label class="pt-2 font-calibri block border-gray-200 rounded ">Ajouter le titre :</label>
                            <input type="text" class="w-full bg-gray-100 appearance-none border-2 border-orange-400 rounded w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-800 " id="tj" name="title" required value="<?php echo $test['title']; ?>" />
                        </div>
                    </div>

                    <div class="mx-1">
                        <div>
                            <input type="hidden" name="idRecipe" value="<?php echo $_GET['id']; ?>" />
                            <input type="hidden" name="oldIngredient" value="<?php echo $test['ingredientId']; ?>" />
                        </div>
                    </div>

                    <div class="mx-1">
                        <div>
                            <label class=" font-calibri block">Ajouter du contenu :</label>
                            <textarea class="w-full bg-gray-100 appearance-none border-2 border-orange-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-800" id="textd" name="content"><?php echo $test['content']; ?></textarea>
                        </div>
                    </div>

                     <div class="mx-1">
                        <div>
                            <label class="pt-2 font-calibri block">Ajouter une durée :</label>
                            <input type="text" class="w-full bg-gray-100 appearance-none border-2 border-orange-400 rounded w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-800" name="duree" required value="<?php echo $test['duree']; ?>" />
                        </div>
                    </div>

                     <div class="mx-1">
                        <div>
                            <label class="pt-2 font-calibri block">Ajouter un nombre de personne:</label>
                            <input type="number" class="w-full bg-gray-100 appearance-none border-2 border-orange-400 rounded w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-800" name="persons" required value="<?php echo $test['persons']; ?>" />
                        </div>
                    </div>

                     <div class="mx-1">
                        <div>
                            <label class="pt-2 font-calibri block">Selectionner vos ingredient:</label>
                                <select  data-rel="chosen"  name="ingredient" id="selectingredient">
                                <?php foreach($getindredient as $value) { echo "<option value =$value[id]>$value[name]</option>";
                                }?>
                                </select>
                        </div>
                    </div>

                    <div class="mx-1">
                        <div>
                            <label class="pt-2 font-calibri block">Ajouter une image :</label>
                            <input type="file" name="image" id="image"/>
                        </div>
                    </div>

                       
                     <div class="mx-1">
                        <div>
                            <label class="pt-2 font-calibri block">Ajouter une quantité:</label>
                            <input type="number" class="w-full bg-gray-100 appearance-none border-2 border-orange-400 rounded w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-800" name="quantity" required value="<?php echo $test['quantity']; ?>"/>
                        </div>
                    </div>


                    <div class="flex justify-center">
                        <button type="submit" id="validation" class="mt-6 bg-orange-400 text-white rounded py-2 px-4 hover:bg-orange-300 text-black hover:text-white px-10 p-1" name="modifier">Modifier</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>