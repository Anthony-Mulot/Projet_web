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

<!DOCTYPE html>
<html lang="fr">
<?php
include_once("Recette.php");
$recette = new Recette();
$touteslesrecipe = $recette->getrecipe();

?>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://kit.fontawesome.com/cd3053ba4f.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<title>Modification des recettes</title>

<body>
    <div class="flex-col   ">

        <div class=" lg:flex sm:block block   w-full">
            <div id="navbar" class=" ">
                <div class="">
                    <img src="img\unnamed.jpg" alt="" class="w-32 xl:h-32 mx-10 mb-8 mr-2 rounded-full ">
                    <a href="index.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4  p-1"><i class="fas pr-2 fa-bars"></i>Accueil du site</a>
                    <a href="ajoutIngredient.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-folder-plus"></i> Ajouter un ingredient</a>
                    <a href="gestiondroitsadmin.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-fw fa-user"></i>Gérer les droits utilisateurs</a>
                    <a href="allrecette.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-fw fa-clipboard-list"></i>Toutes les recettes</a>
                    <a href="ajoutRecette.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-plus"></i></i> Ajouter une recette</a>
                    <a href="compte.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas fa-user-circle"></i> Compte utilisateur</a>
                    <a href="allFavorites.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="far fa-star"></i> Afficher mes favoris</a>
                    <a href="deconnection.php" class="pb-2 font-calibri text-lg block bg-transparent hover:bg-gray-400  hover:text-black px-4 p-1"><i class="fas pr-1 fa-sign-out-alt"></i>Se deconnecter</a>
                </div>
            </div>

            <div class="w-full">


                <div class="bg-gray-400 flex-auto  px-4">

                    <div class="max-w-3xl mx-auto relative ">
                        <h1 class="text-center font-calibri text-black text-4xl pb-4"><i class="fas fa-pencil-alt"></i> Modification des recettes</h1>
                    </div>

                    <table class="table-auto align-center mx-auto  mx-10">
                        <thead>
                            <tr class="text-gray-200 bg-white appearance-none border-2 border-orange-400 border-r border-white rounded">

                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white  text-left">Titre</th>
                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white w-full text-left">Contenu</th>
                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white w-full text-left">Image</th>
                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white w-full text-left">Durée</th>
                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white w-full text-left">Nombre de personne</th>
                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white w-full text-left">Ingredient</th>
                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white w-full text-left">Quantité</th>
                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white w-full text-left">Unité</th>
                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white w-full text-left">Modification</th>
                                <th class="font-calibri px-4 py-2 bg-orange-400 border-r border-white w-full text-left">Supression</th>
                            </tr>
                        </thead>
                        
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
                                    <a href="ModifierRecetteAdmin.php?recipe_id=<?php echo $result['recipe_id'] ?>"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">Modifier</button></a>
                                </td>
                                <td class="bg-white font-calibri border px-4 py-2 text-center">
                                    <a href="SupprimerRecetteAdmin.php?recipe_id=<?php echo $result['recipe_id'] ?> "><button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded">Supprimer</button></a>
                                </td>
                        </tr>
                    <?php    } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>