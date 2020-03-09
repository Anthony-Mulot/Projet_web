<!DOCTYPE HTML>
<html lang="fr">

<head>
    <?php
    include_once('User.php');
    if (session_id() == "") {
        session_start();
    }
    $user = new User();
    if ($user->isAdmin($_SESSION["id"]) == FALSE) {
        header('location: index.php');
    }

    ?>
    <meta charset="utf-8" />
    <link href="https://unpkg.com/tailwindcss@%5E1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd3053ba4f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="js/ajoutIngredient.js"></script>
    <title>Ajout d'ingrédient et d'unité</title>
</head>

<body>


    <div class="flex-col h-screen ">
        <div class=" lg:flex sm:block block   h-full w-full">

            <div id="navbar" class="">
                <div class="">
                    <img src="img\unnamed.jpg" alt="" class="w-32 xl:h-32 mx-10 mb-8 mr-2 rounded-full ">
                    <a href="index.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4  p-1"><i class="fas pr-2 fa-bars"></i>Accueil du site</a>
                    <a href="allrecette.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-fw fa-clipboard-list"></i>Toutes les recettes</a>
                    <a href="allFavorites.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="far fa-star"></i>Afficher mes favoris</a>
                    <a href="afficheRecetteAdmin.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-hammer"></i> Modification des recettes</a>
                    <a href="ajoutRecette.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-plus"></i></i> Ajouter une recette</a>
                    <a href="compte.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-user-circle"></i> Compte utilisateur</a>
                    <a href="deconnection.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-sign-out-alt"></i>Se deconnecter</a>
                </div>
            </div>


            <div class="bg-gray-400  h-screen flex-auto xl:px-5 px-48 py-12">
                <div class="max-w-3xl mx-auto">
                    <h1 class="text-center font-calibri text-black text-4xl pb-4"><i class="far fa-edit"></i>Ajouter un ingredient :</h1>
                    <form class="w-full h-full pt-6" method="POST" action="configIngredient.php" enctype="multipart/form-data" name="myForm">
                        <div class="flex mb-4 -mx-2">
                            <div class="w-1/2 px-3">
                                <label class="font-calibri block border-gray-200 rounded ">Ajouter le nom de l'ingredient :</label>
                                <input type="text" class="w-full bg-gray-100 appearance-none border-2 border-orange-400 rounded w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-yellow-800" id="tj" name="name" />
                            </div>
                        </div>

                        <div class="mx-1">
                            <div>
                                <label class="font-calibri block">Ajouter une unité :</label>
                                <input type="text" class="w-full bg-gray-100 appearance-none border-2 border-orange-400 rounded w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-yellow-800 " id="tj" name="unit" />
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" id="validation" class="mt-6 bg-orange-400 text-white rounded py-2 px-4 hover:bg-yellow-800 text-black hover:text-white px-10 p-1" name="addingredient">Ajouter</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>