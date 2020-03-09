<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include_once('traitement.php');
    session_start();

    ?>

    <title>Tailwind Admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="js/connect.js"></script>

</head>
<!-- Barre de naviguation  -->

<body class="bg-orange-200">
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
                    <div id="main-nav" class="w-full flex-grow lg:flex items-center lg:w-auto hidden  ">
                        <div class="sm:flex-grow text-sm lg:flex-grow mt-2 animated jackinthebox xl:flex xl:mr-auto xl:mx-8 items-center">

                            <div class="xl:flex">
                                <a href="index.php" id="accueilnav" class="block hover:text-white lg:inline-block text-md font-bold p-1 text-white mx-2  xl:p-4 ">
                                    ACCUEIL
                                </a>
                                <a href="allrecette.php" id="" class="block lg:inline-block text-md font-bold   text-white   hover: mx-2 p-1 xl:p-4  rounded-lg">
                                    RECETTES
                                </a>
                               
                                <a href="form.php" class="block pb-4 lg:inline-block text-md font-bold  text-white  p-1  hover: mx-2  xl:p-4  rounded-lg">
                                    NOUS CONTACTER
                                </a>
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

    
        <!-- Container -->
        <div class=" w-full ">
            <div class="flex container mx-auto justify-center xl:py-8 ">
                <!-- Row -->
                <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                    <!-- Col -->
                    <div class="w-full h-auto  hidden lg:block lg:w-1/2 bg-cover bg-center rounded-l-lg" style="background-image: url('img/nourriture1.jpg')"></div>
                    <!-- Col -->
                    <div class="w-full lg:w-1/2 bg-white  rounded-lg lg:rounded-l-none">
                        <h3 class="pt-4 text-2xl text-center">Quelle plaisir de vous revoir !</h3>

                        <form name="myForm" class="px-8 pt-6 pb-8 mb-4  rounded" action="traitement.php" method="POST">
                        <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
                                    Adresse Mail
                                </label>
                                <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="azerty@monsite.fr" name="email" />
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                    Mot de passe
                                </label>
                                <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="" name="password" />

                            </div>
                            
                            <div class="mb-6 text-center">
                                <button class="w-full px-4 py-2 font-bold text-white bg-green-500 rounded-full hover:bg-green-700 focus:outline-none focus:shadow-outline" type="submit" name="validation" id="valider">
                                    Se connecter
                                </button>
                            </div>
                        </form>
                    </div>
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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

</body>
<footer>
    <div class="bg-orange-400 mt-10 md:flex ">

        <div class="border-orange-400">
            <a href="index.php">
                <img src="img/unnamed.jpg" class="border-orange-400 border-4 pt-20" alt="la description textuelle de ton image"id="logosite" />
            </a>
        </div>

        <div class="w-full text-justify lg:mx-auto xl:mx-auto px-10 py-10  w-1/4">
            <h4 class="border-b border-orange-800 mb-6">A PROPOS</h4>
            <div class="mx-auto  text-justify">
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