<!DOCTYPE html>
<html lang="fr">

<head>
<?php    
session_start();

if (session_id() == "") {
    session_start();
}

include_once('bdd.php');
?>
<title>Projet CESI</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>

<body class=" ">

    <header class="w-full " id="navbar">

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
                    <div id="main-nav" class="w-full flex-grow lg:flex items-center lg:w-auto hidden ">
                        <div class="sm:flex-grow text-sm lg:flex-grow mt-2 animated jackinthebox xl:flex xl:mr-auto xl:mx-8 items-center">

                            <div class="xl:flex">

                                <?php
                                if (isset($_SESSION['login'])) {

                                    echo '<a href="accueilAdmin.php" id="accueilnav" class="block mb-2 xl:mb-0 lg:inline-block text-md font-bold  hover: mx-2  xl:p-2  rounded-lg">
                                            ADMIN
                                        </a>
                                        <a href="compte.php" class="block lg:inline-block text-md font-bold   text-white   hover: mx-2  xl:p-2  rounded-lg">
                                        MON COMPTE
                                    </a>
                                  
                                      <ul class="flex mb-2 xl:mb-0 flex-wrap text-md font-bold pt-2  text-white  rounded-lg " id="accueilnav">
                                    
                                    <li class="relative  group   " id="navbar">
                                    <a class="font-semibold whitespace-no-wrap  ml-2 xl:ml-0  text-white font-bold text-sm"
                                        href="">
                                        <span class="firstlevel">LES RECETTES</span>
                                    </a>
                                    <ul class="absolute left-0 top-0 mt-6 p-2 rounded-lg shadow-lg  z-10 hidden group-hover:block" id="barre">
                                        
                                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                        </svg>
                                        <li
                                        class="p-1 whitespace-no-wrap  text-sm md:text-base text-white hover:text-gray-800 hover:bg-gray-100">
                                        <a class="px-2 py-1"
                                            href="afficheRecette.php">
                                            <span class="">Mes recettes</span>
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
                                                                
                               
                                    <a href="shoppingList.php" class="block mb-2 xl:mb-0 lg:inline-block text-md font-bold   text-white   hover: mx-2  xl:p-2  rounded-lg">
                                        SHOPPING LIST
                                    </a>
                                        ';
                                } else {
                                    echo '  
                                   
                                    <a href="allrecette.php" class="block lg:inline-block text-md font-bold pb-2 xl:pb-0  text-white   hover: mx-2  xl:p-2  rounded-lg">
                                    LES RECETTES
                                </a>
                                <a href="form.php" class="block lg:inline-block text-md font-bold pb-4 xl:pb-0  text-white   hover: mx-2  xl:p-2  rounded-lg">
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

                            <div class="relative  items-center text-gray-600">
                                <form method="POST"> 
                                    <input type="text" name="titre_des_recettes" placeholder="Rechercher" class="bg-white h-10 px-4 -mr-2   xl:w-64 rounded-l-lg text-sm focus:outline-none" value ="<?php if (isset($_POST['titre_des_recettes'])) {
                                   } ?>" />
                                    
                                    <button type ="submit" id="barre" class="text-white font-bold py-2 px-4 rounded-r-lg">Entrer</button>
                                </form>
                            </div>
             
                            <div class="flex pl-4 justify-center mt-6 xl:mt-0">

                                <?php

                                if (isset($_SESSION['login'])) {

                                    echo '<img src="img/zondicons/user.svg" class=" justify-center w-6"> <a href="deconnection.php" class="   block lg:inline-block text-sm font-bold   text-white  justify-center hover: mx-2 p-1 xl:p-2 rounded-lg"> SE DECONNECTER </a>';
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


    <div class="">

        <div class="flex-grow mb-8 mx-auto  mx-8 xl:mx-20 xl:mt-6 ">
            <div class="carousel relative -2xl bg-white " id="caroussel">
                <div class="carousel-inner xl:h-64 relative overflow-hidden ">
                    <!--Slide 1-->
                    <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                    <div class="carousel-item absolute opacity-0" style="">
                        <div class="block h-32 xl:h-full    text-white text-5xl  text-center "> <img src="img/chicken.jpg" class=""></div>
                    </div>
                    <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                    <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                    <!--Slide 2-->
                    <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                    <div class="carousel-item absolute opacity-0" style="">
                        <div class="block  h-32 xl:h-full  text-white text-5xl  text-center"><img src="img/nourriture1.jpg" class=""></div>
                    </div>
                    <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                    <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                    <!--Slide 3-->
                    <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                    <div class="carousel-item absolute opacity-0" style="">
                        <div class="block h-32 xl:h-full  text-white  text-5xl text-center"><img src="img/legumes.jpg" class=""></div>
                    </div>
                    <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                    <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

                    <!-- Add additional indicators for each slide-->
                    <ol class="carousel-indicators">
                        <li class="inline-block mr-3">
                            <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                        </li>
                        <li class="inline-block mr-3">
                            <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                        </li>
                        <li class="inline-block mr-3">
                            <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                        </li>
                    </ol>

                </div>
            </div>
        </div>
    </div>

    <div class=" lg:flex px-8 ">
        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('img/malbouffe.jpg')" title="Woman holding a mug">
        </div>
        <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <p class="text-sm text-gray-600 flex items-center">


                </p>
                <div class="text-gray-900 font-bold text-xl mb-2">La recette du jour</div>
                <p class="text-gray-700 text-base"> Tartiflette revisité - Lorraine</p>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui aliquam dicta eum ut quae reprehenderit. Animi, magni assumenda! Rem tenetur maiores ipsam, perspiciatis quidem alias dolore eligendi error blanditiis accusantium?

            </p>
            <div class="flex items-center mt-8">
                <img class="w-10 h-10 rounded-full mr-4" src="/img/jonathan.jpg" alt="">
                <div class="text-sm">
                    <p class="text-gray-900 leading-none">anthony "Admin"</p>
                    <p class="text-gray-600">02-03-2020</p>
                </div>
            </div>
        </div>
    </div>

    
    <div class=" w-full flex ">

        <div class=" mx-auto w-full h-full" id="boxrecipe">
            <div class="container my-12 mx-auto px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">

                    <!-- Column -->
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                        <article class="overflow-hidden rounded-lg ">

                        
                        <p class="flex"><?php

                            if(isset($_POST['titre_des_recettes'])) {

                                $titre_des_recettes = $_POST['titre_des_recettes'];
                                 $sql = "SELECT * FROM recipe WHERE title LIKE '%" . $titre_des_recettes . "%'";
                                $bdd = new Bdd();
                                $requete = $bdd->getBdd()->prepare($sql);
                                $requete->execute();
                                $datatitre = $requete->fetchAll();

                             }
                                
                                if(isset($_POST["titre_des_recettes"])) {
                                    foreach ($datatitre as $value) {
                                    ?><div class="block justify-between shadow bg-gray-200 ">
                                    <div class="mx-2">Titre de la recette : <?php echo $value["title"]; ?></div>
                                    <div class="mx-2">Contenu de la recette : <?php echo $value["content"]; ?></div>
                                    <div class="mx-2">Temps de préparation : <?php echo $value["duree"]; ?></div>
                                    <div class="mx-2">Nombre de personnes : <?php echo $value["persons"]; ?></div>
                                    <div class="mx-2 border-b-4 border-orange-400  "><?php echo $value['image'] . '<img class="w-38" src="img/' . $value["image"] . '">'; ?></div><p>
                        <?php } }?> 



                            <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <a class="flex items-center no-underline hover:underline text-black" href="#">
                                    <p class="ml-2 text-sm">
                                    </p>
                                </a>
                                <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                    
                                </a>
                            </footer>
                            <div>

                            </div>   
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-8">
        <button id="" class="border border-orange-400 text-orange-400 block rounded-sm font-bold py-4 px-6 mr-2 flex items-center hover:bg-orange-400 hover:text-white">
            <svg class="h-5 w-5 mr-2 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
            </svg>
            Previous page
        </button>
        <button class="  border border-orange-400 bg-orange-400 text-white block rounded-sm font-bold py-4 px-6 ml-2 flex items-center">
            Next page
            <svg class="h-5 w-5 ml-2 fill-current" clasversion="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                <path id="XMLID_11_" d="M-24,422h401.645l-72.822,72.822c-9.763,9.763-9.763,25.592,0,35.355c9.763,9.764,25.593,9.762,35.355,0
            l115.5-115.5C460.366,409.989,463,403.63,463,397s-2.634-12.989-7.322-17.678l-115.5-115.5c-9.763-9.762-25.593-9.763-35.355,0
            c-9.763,9.763-9.763,25.592,0,35.355l72.822,72.822H-24c-13.808,0-25,11.193-25,25S-37.808,422-24,422z" />
            </svg>
        </button>
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


<footer class="pt-10">
    <div class="bg-orange-400  md:flex ">

        <div class="border-orange-400">
            <a href="index.php">
                <img src="img/unnamed.jpg" class="border-orange-400 border-4 pt-20" alt="la description textuelle de ton image"id="logosite" />
            </a>
        </div>

        <div class="w-full text-justify lg:mx-auto xl:mx-auto px-10 py-10  w-1/4">
            <h4 class="border-b border-orange-800 mb-6">A PROPOS</h4>
            <div class="mx-auto  text-justify">
                <li><a href="">Conditions géneral d'utilisateurs</a></li>
                <li><a href="">A propos de nous</a></li>
                <li><a href="">Notre Histoire</a></li>
                <li><a href="">Informations géneral</a></li>
                
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