<!DOCTYPE HTML>
<html lang="fr">

<head>
<?php
   
if (session_id() == "") {
    session_start();
}

include_once('User.php');


if (empty($_SESSION)) {
    header('location:index.php');
}

$user = new User();
if ($user->isAdmin($_SESSION["id"]) == FALSE) {
    header('location: index.php');
}

    ?>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://kit.fontawesome.com/cd3053ba4f.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>accueil</title>
</head>

<body>
    
    <div class="flex-col h-screen ">

        <div class=" lg:flex sm:block block   h-full w-full">
            <div id="navbar" class=" ">
                <div class="">
                    <img src="img\unnamed.jpg" alt="" class="w-32 xl:h-32 mx-10 mb-8 mr-2 rounded-full ">
                    <a href="index.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4  p-1"><i class="fas pr-2 fa-bars"></i>Accueil du site</a>
                    <a href="ajoutIngredient.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-folder-plus"></i> Ajouter un ingredient</a>

                    <a href="gestiondroitsadmin.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-fw fa-user"></i>Gérer les droits utilisateurs</a>

                    <a href="allFavorites.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="far fa-star"></i>Afficher mes favoris</a>
                    
                    <a href="allrecette.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-fw fa-clipboard-list"></i>Toutes les recettes</a>
                    <a href="afficheRecetteAdmin.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-hammer"></i> Modification des recettes</a>
                    <a href="ajoutRecette.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-plus"></i></i> Ajouter une recette</a>
                    <a href="compte.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-user-circle"></i> Compte utilisateur</a>
                    <a href="deconnection.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-sign-out-alt"></i>Se deconnecter</a>
                </div>
            </div>

            <div class="bg-gray-300 w-full ">

                <p class="text-center pt-8 pb-8 text-2xl">
                    <?php
                    if (isset($_SESSION['login'])) {
                        echo ' Bonjour ' . $_SESSION['login'] . ' ! ';
                    } else {
                        echo 'Bonjour';
                    }
                    ?>


                </p>
                


                
                <div class=" px-8 w-full justify-around md:flex sm:flex">

               

                    <div class="max-w-sm xl:w-64 rounded overflow-hidden  shadow-lg">
                        <img class="w-full h-40" src="img/ingredient.jpg" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class=" text-center text-xl mb-2">
                                <a href="ajoutIngredient.php">Ajouter un ingredient</a>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm xl:w-64 rounded overflow-hidden  shadow-lg">
                        <img class=" w-full h-40" src="img/admin.jpg" alt="Sunset in the mountains">
                        <div class="h-10 px-6 py-4">
                            <div class=" text-center text-xl mb-2">
                                <a href="gestionDroitsAdmin">Droits utilisateur</a>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm xl:w-64 rounded overflow-hidden  shadow-lg">
                        <img class="w-full h-40 " src="img/recette.png" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class=" text-center text-xl mb-2">
                                <a href="afficheRecetteAdmin.php">Les recettes</a>
                            </div>
                        </div>
                    </div>

                </div>



            </div>

        </div>

    </div>


    </div>

</body>

</html>