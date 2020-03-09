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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://kit.fontawesome.com/cd3053ba4f.js" crossorigin="anonymous"></script>
    <title>accueil</title>
</head>

<body class="h-screen">

    <div class="flex items-scretch h-full">
        <div id="navbar" class=" absolute md:static  md:h-auto w-full md:w-64 hidden md:block flex-initial">
            <div class="mt-16">
            <img src="img\unnamed.jpg" alt="" class="w-32 xl:h-32 mx-10 mb-8 mr-2 rounded-full ">
               <a href="index.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4  p-1"><i class="fas pr-2 fa-bars"></i>Accueil du site</a>
                    <a href="ajoutIngredient.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-folder-plus"></i> Ajouter un ingredient</a>
                    <a href="allrecette.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-fw fa-clipboard-list"></i>Toutes les recettes</a>
                    <a href="afficheRecetteAdmin.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-hammer"></i> Modification des recettes</a>
                    <a href="ajoutRecette.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-plus"></i></i> Ajouter une recette</a>
                    <a href="compte.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-user-circle"></i> Compte utilisateur</a>
                    <a href="deconnection.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-sign-out-alt"></i>Se deconnecter</a>
            </div>
        </div>

        <div class="bg-gray-300  flex-auto px-5 py-12">

            <p class="text-center text-2xl">
                <?php
                if (isset($_SESSION['login'])) {
                    echo ' Bonjour ' . $_SESSION['login'] . ' ! ';
                } else {
                    echo 'Bonjour';
                }
                ?>


            </p>

            <?php
            include_once("User.php");
            include_once('bdd.php');
            $user = new User();


            //Condition pour vérifier si l'utilisateur connecté est administrateur et peut accéder à cette page
            if ($user->isAdmin($_SESSION["id"]) == FALSE) {
                header('location: index.php');
            }

            $bdd = new Bdd();
            $req = $bdd->getBdd()->query('SELECT id, login, isAdmin FROM user ORDER BY user.login ASC');

            ?>

            
            <p class="font-bold text-3xl text-gray-800 mb-6 mt-6 px-3"></i>Gestion des droits</i></p>


            <?php
            while ($result = $req->fetch()) {
            ?>
                <div class="w-1/2 v flex-auto bg-gray-300 rounded shadow-lg ml-3 mb-3" id='<?php echo ($result['id']) ?>'>
                    <div class="px-5 py-5 max-w-2xl ">

                        <p class="">
                            <?php echo ('#' . $result['id'] . ' '); ?>
                        </p>

                        <p class="font-bold">
                            <?php echo ($result['login'] . ' '); ?>
                        </p>

                        <p class="italic">
                            <?php if ($result['isAdmin'] == 1) { //Affichage si l'utilisateur de la bdd est admin
                                echo ("Administrateur <button type=\"button\" class=\"block bg-red-500 hover:bg-red-700 text-white 
                    font-bold py-2 px-4 mb-3 mt-3 rounded\" onclick=\"window.location.href = 't_gestionDroits.php?id=" . $result['id'] . "'\">
                    Enlever les droits
                    </button></p>");
                            } else { //Affichage si l'utilisateur de la bdd n'est pas admin
                                echo ("Utilisateur <button type=\"button\" class=\"block bg-green-500 hover:bg-green-700 text-white 
                    font-bold py-2 px-4 mb-3 mt-3 rounded\" onclick=\"window.location.href = 't_gestionDroits.php?id=" . $result['id'] . "'\">
                    Ajouter les droits
                    </button></p>");
                            } ?>

                    </div>
                </div>

            <?php
            }
            ?>


        </div>

    </div>
</body>

</html>