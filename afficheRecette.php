<?php
if (session_id() == "") {
    session_start();
}

if (empty($_SESSION)) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php
include_once("Recette.php");
$recette = new Recette();
$touteslesrecipe = $recette->getrecipeuser();
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://kit.fontawesome.com/cd3053ba4f.js" crossorigin="anonymous"></script>

</head>
<title>Modification des recettes</title>

<body class="h-screen">
    <div class="flex items-scretch w-full">
        <header class="w-full  " id="navbar">

            <!-- Barre de naviguation  -->

            <div class="py-4 px-2 lg:mx-4 xl:mx-12 ">
                <div class="">
                    <nav class="flex items-center justify-between flex-wrap  ">
                        <div class="flex items-center flex-no-shrink text-white mr-6 ">
                            <img src="img\unnamed.jpg" alt="" class="w-32 xl:h-32  mr-2 rounded-full ">
                        </div>
                        <div class="block lg:hidden">
                            <button class="navbar-burger flex items-center px-3 py-2 border rounded text-white border-white hover:text-white hover:border-white">
                                <svg class="fill-current h-6 w-6 text-gray-700" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Menu</title>
                                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                                </svg>
                            </button>

                        </div>
                        <div id="main-nav" class="w-full flex-grow lg:flex items-center lg:w-auto hidden  ">
                            <div class="sm:flex-grow text-sm lg:flex-grow mt-2 animated jackinthebox xl:flex xl:mr-auto xl:mx-8 items-center">

                                <div class="xl:flex">

                                    <?php
                                    if (isset($_SESSION['login'])) {

                                        echo '<a href="index.php" id="accueilnav" class="block lg:inline-block text-md font-bold  hover: mx-2  xl:p-2  rounded-lg">
                                    ACCUEIL
                                </a>
                                <a href="compte.php" class="block lg:inline-block text-md font-bold   text-white   hover: mx-2  xl:p-2  rounded-lg">
                                MON COMPTE
                            </a>
                          
                            <ul class="flex flex-wrap text-md font-bold pt-2  text-white  rounded-lg " id="accueilnav">
                            
                            <li class="relative  group   " id="navbar">
                            <a class="font-semibold whitespace-no-wrap text-white font-bold text-sm"
                                href="">
                                <span class="firstlevel">LES RECETTES</span>
                            </a>
                            <ul class="absolute left-0 top-0 mt-6 p-2 rounded-lg shadow-lg  z-10 hidden group-hover:block" id="barre">
                                        
                                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                        </svg>
                                <li
                                class="p-1 whitespace-no-wrap  text-sm md:text-base text-white hover:text-gray-800 hover:bg-gray-100">
                                <a class="px-2 py-1"
                                    href="allFavorites.php">
                                    <span class="">Mes recettes en favoris</span>
                                </a>
                                </li>
                                <li
                                class="p-1 whitespace-no-wrap  text-sm md:text-base text-white hover:text-gray-800 hover:bg-gray-100">
                                <a class="px-2 py-1" href="AjoutRecette.php">
                                    <span class="">Ajouter une recette</span>
                                </a>
                                </li>
                                <li
                                class="p-1 whitespace-no-wrap  text-sm md:text-base text-white hover:text-gray-800 hover:bg-gray-100">
                                <a class="px-2 py-1" href="allrecette.php">
                                    <span class="">Afficher toutes les recettes</span>
                                </a>
                                </li>
                            </li>
                        </ul>
                        </ul>
                                                        
                       
                            <a href="moncompte.php" class="block lg:inline-block text-md font-bold   text-white   hover: mx-2  xl:p-2  rounded-lg">
                                SHOPPING LIST
                            </a>
                                ';
                                    } else {
                                        echo '  
                           <a href="recettes.php" class="block lg:inline-block text-md font-bold   text-white   hover: mx-2  xl:p-2  rounded-lg">
                            XXXX
                        </a>
                            <a href="recettes.php" class="block lg:inline-block text-md font-bold   text-white   hover: mx-2  xl:p-2  rounded-lg">
                            RECETTES
                        </a>
                        <a href="ingredient.php" class="block lg:inline-block text-md font-bold p  text-white   hover: mx-2  xl:p-2  rounded-lg">
                            NOUS CONTACTER
                        </a>';
                                    } ?>



                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                    </div>
                                </div>



                            </div>

                            <div class="xl:flex xl:ml-auto items-center">
                                <div class="flex pl-4">

                                    <?php

                                    if (isset($_SESSION['login'])) {

                                        echo '<img src="img/zondicons/user.svg" class=" w-6"> <a href="deconnection.php" class="   block lg:inline-block text-sm font-bold   text-white   hover: mx-2 p-1 xl:p-2 rounded-lg"> SE DECONNECTER </a>';
                                    } else {
                                        echo '<img src="img/zondicons/user.svg" class="  w-6"><a href="connect.php" class="   block lg:inline-block text-sm font-bold  text-white     mx-2  p-1  rounded-lg">
                        SE CONNECTER
                        </a>
                        <p class="p-1 ">/<p>
                        <a href="inscription.php" class="block lg:inline-block text-sm font-bold  text-white   p-1  mx-2   rounded-lg">
                        S\'INSCRIRE
                        </a>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                </div>
                </nav>
            </div>
    </div>
    </header>

    <div class="h-20 pb-6 w-full" id="barre">


    </div>


    <div class="bg-gray-400   flex-auto px-5 py-12">
        <div class="max-w-3xl mx-auto relative ">
            <h1 class="text-center font-calibri text-black text-4xl"><i class="fas fa-wrench"></i> Modification des recettes</h1>
        </div>

        <table class="table-auto align-center  mx-auto mt-10">
            <thead class="">
                <tr class="text-gray-200 bg-white appearance-none border-2 border-black rounded">

                    <th class=" font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black text-left">Titre</th>
                    <th class="font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black w-full text-left">Contenu</th>
                    <th class="font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black w-full text-left">Image</th>
                    <th class="font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black w-full text-left">Durrée</th>
                    <th class="font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black w-full text-left">Nombre de personne</th>
                    <th class="font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black w-full text-left">Ingredient</th>
                    <th class="font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black w-full text-left">Quantité</th>
                    <th class="font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black w-full text-left">Unité</th>
                    <th class="font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black w-full text-left">Modification</th>
                    <th class="font-calibri border-r-2 border-black px-4 py-2 bg-orange-400 text-black w-full text-left">Supression</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white"><?php
                                        foreach ($touteslesrecipe as $result) { ?>
                        <td class="bg-white font-calibri border px-4 py-2 text-left">
                            <?php echo $result['title']; ?>
                        </td>

                        <td class="bg-white font-calibri border px-4 py-2 text-left">
                            <?php echo $result['content']; ?>
                        </td>

                        <td class="bg-white font-calibri border px-4 py-2 text-center">
                            <?php echo $result['image'] . '<img class="w-48" src="img/' . $result["image"] . '">'; ?></td>

                        <td class="bg-white font-calibri border px-4 py-2 text-center">
                            <?php echo $result['duree']; ?></td>

                        <td class="bg-white font-calibri border px-4 py-2 text-center">
                            <?php echo $result['persons']; ?></td>

                        <td class="bg-white font-calibri border px-4 py-2 text-center">
                            <?php echo $result['name']; ?></td>


                        <td class="bg-white font-calibri border px-4 py-2 text-center">
                            <?php echo $result['quantity']; ?></td>

                        <td class="bg-white font-calibri border px-4 py-2 text-center">
                            <?php echo $result['unit']; ?></td>

                        <td class="bg-white font-calibri border px-4 py-2 text-center">
                            <a href="ModifierRecette.php?id=<?php echo $result['recipe_id'] ?>"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">Modifier</button></a>
                        </td>
                        <td class="bg-white font-calibri border px-4 py-2 text-center">
                            <a href="SupprimerRecette.php?recipe_id=<?php echo $result['recipe_id'] ?> "><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded">Supprimer</button></a>
                        </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
    <script>
        // Navbar Toggle
        document.addEventListener('DOMContentLoaded', function() {

            // Get all "navbar-burger" elements
            var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Check if there are any navbar burgers
            if ($navbarBurgers.length > 0) {

                // Add a click event on each of them
                $navbarBurgers.forEach(function($el) {
                    $el.addEventListener('click', function() {

                        // Get the "main-nav" element
                        var $target = document.getElementById('main-nav');

                        // Toggle the class on "main-nav"
                        $target.classList.toggle('hidden');

                    });
                });
            }

        });
    </script>
</body>
<footer>
    <div class="bg-orange-400  md:flex ">

        <div class="border-orange-400">
            <a href="index.php">
                <img src="img/unnamed.jpg" class="border-orange-400 border-4 pt-20" alt="la description textuelle de ton image"id="logosite" />
            </a>
        </div>

        <div class="w-full text-justify lg:mx-auto xl:mx-auto px-10 py-10  w-1/4">
            <h4 class="border-b border-orange-800 mb-6">A PROPOS</h4>
            <div class="mx-auto text-justify">
                <li><a href="">Condition géneral d'utilisateur</a></li>
                <li><a href="">A propos de nous</a></li>
                <li><a href="">Notre Histoire</a></li>
                <li><a href="">informations géneral</a></li>
                <li><a href="">...</a></li>
            </div>


        </div>

        <div class="w-full xl:mx-auto px-10 py-10 w-1/4 ">
            <h4 class="border-b border-orange-800 mb-6">SUIVEZ NOUS</h4>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio eum soluta neque. Doloremque vero odio possimus cum quae at dolorum assumenda facilis sed, laborum obcaecati in reiciendis eius, necessitatibus deserunt.. </p>

        </div>

        <div class="w-full mx-auto px-10 py-10 w-1/4">
            <h4 class="border-b border-orange-800 mb-6">MENTIONS LEGALES</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

    </div>



</footer>

</html>