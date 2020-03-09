<?php 
include_once('bdd.php');
require __DIR__.'/vendor/autoload.php';
use Dompdf\Dompdf;

Class Recette extends Bdd 
{
	public $_id;
	public $_title;
	public $_content;
	public $_image;
	public $_duree;
	public $_persons;
	public $_user;
	public $_ingredient;
	public $_quantity;
	public $_recipe;
    public $_user2;

    //ajoute une recette avec les champs du form et recupere l'id de la derniere insertion 
    public function postrecette($_title,$_content,$_image,$_duree,$_persons,$_user) {
        
        $bdd = new Bdd();
        $sql = 'INSERT INTO recipe (title,content,image,duree,persons,user) VALUES (:title,:content,:image,:duree,:persons,:user)';
        $test = $bdd->getBdd();
        $requete = $test->prepare($sql);
        $requete->bindValue(":title", $_title, PDO::PARAM_STR);
        $requete->bindValue(":content", $_content, PDO::PARAM_STR);
        $requete->bindValue(":image", $_image, PDO::PARAM_STR);
        $requete->bindValue(":duree", $_duree, PDO::PARAM_STR);
        $requete->bindValue(":persons", $_persons, PDO::PARAM_INT);
        $requete->bindValue(":user", $_user, PDO::PARAM_INT);
        $requete->execute();
        $requete = $test->prepare("SELECT LAST_INSERT_ID() as id");
        $requete->execute();
        $req = $requete->fetchColumn();
        return $req;
    }

        public function getrecipe() {
        //Getrecipe récupère tout les recipeingredient en faisant aussi la jointure avec ingrédient (pour avoir les donnés) mais aussi avec recipe (pour avoir les info du recipe)
        $requete = $this->getBdd()->prepare('SELECT recipe.id AS "recipe_id", recipe.title, recipe.content, recipe.image, recipe.duree, recipe.persons, recipe.user, ingredient.id AS "ingredient_id", ingredient.name, ingredient.unit, recipeingredient.recipe AS "recipeId", recipeingredient.ingredient AS "ingredientId", recipeingredient.quantity FROM `recipeingredient`INNER JOIN `recipe` ON `recipe`.id = `recipeingredient`.recipe INNER JOIN `ingredient` ON `ingredient`.id = `recipeingredient`.ingredient');
        $requete->execute();
        $req = $requete->fetchAll();
        return $req; 
    }
    //Updateallrecipeuser met à jour la table recipe et recipeingredient selon l'user, la recette et l'ingredient
    public function UpdateAllRecipeUser($_title, $_content,$_image,$_duree,$_persons,$_ingredient,$_quantity, $recipe, $oldIngredient) {
        
        $bdd= new Bdd();
        $sql = 'UPDATE
          recipe,
          recipeingredient
        SET
          recipe.title = :title,
          recipe.content = :content,
          recipe.image = :image,
          recipe.duree = :duree,
          recipe.persons = :persons,
          recipe.user = :user,
          recipeingredient.recipe = :recipe,
          recipeingredient.ingredient = :ingredient,
          recipeingredient.quantity = :quantity
        WHERE
          recipe.id = :recipe
          AND recipeingredient.recipe = :recipe
          AND recipeingredient.ingredient = :oldIngredient
          AND recipe.user = :user';
          $data = $bdd->getBdd()->prepare($sql);
          $data->bindValue(":title", $_title, PDO::PARAM_STR);
          $data->bindValue(":content", $_content, PDO::PARAM_STR);
          $data->bindValue(":image", $_image, PDO::PARAM_STR);
          $data->bindValue(":duree", $_duree, PDO::PARAM_STR);
          $data->bindValue(":persons", $_persons, PDO::PARAM_STR);
          $data->bindValue(":user", $_SESSION['id'], PDO::PARAM_STR);
          $data->bindValue(":recipe", $recipe, PDO::PARAM_STR);
          $data->bindValue(":ingredient", $_ingredient, PDO::PARAM_STR);
          $data->bindValue(":oldIngredient", $oldIngredient, PDO::PARAM_STR);//garder l'ancien id de l'ingredient 
          $data->bindValue(":quantity", $_quantity, PDO::PARAM_INT);
          $data->execute();
    }

    //même fonction que getrecipe avec condition pour le user
    public function getrecipeuser(){

        $requete = $this->getBdd()->prepare('SELECT recipe.id AS "recipe_id", recipe.title, recipe.content, recipe.image, recipe.duree, recipe.persons, recipe.user, ingredient.id AS "ingredient_id", ingredient.name, ingredient.unit, recipeingredient.recipe AS "recipeId", recipeingredient.ingredient AS "ingredientId", recipeingredient.quantity FROM `recipeingredient`INNER JOIN `recipe` ON `recipe`.id = `recipeingredient`.recipe INNER JOIN `ingredient` ON `ingredient`.id = `recipeingredient`.ingredient WHERE recipe.user = ' . $_SESSION["id"]);
        $requete->execute();
        $req = $requete->fetchAll();
        return $req; 
    }

    //ajoute en bdd l'id du recipe, l'ingredient et la quantité
    public function postallinfo($_recipe,$_ingredient, $_quantity) {
    
        $bdd= new Bdd();
        $sql = 'INSERT INTO recipeingredient (recipe, ingredient, quantity) VALUES (:recipe,:ingredient, :quantity)';
        $requete = $bdd->getBdd()->prepare($sql);
        $requete->bindValue(":recipe", $_recipe, PDO::PARAM_INT);
        $requete->bindValue(":ingredient", $_ingredient, PDO::PARAM_INT);
        $requete->bindValue(":quantity", $_quantity, PDO::PARAM_INT);
        $requete->execute();
    }

    //Vérifie si un article est déjà présent dans les favoris de l'utilisateur
    public function isFavorite($_id, $_user2) : bool
    {
        $bdd = new Bdd();
        $check = $bdd->getBdd()->prepare('SELECT recipe, user FROM favorite WHERE recipe = :recipe AND user = :user');
        $check->execute(array(
            'recipe' => $_id,
            'user' => $_user2
        ));
        $result = $check->fetch();

        if (empty($result['recipe']) && empty($result['user']))
        {
            return FALSE;
        }
        else if (!empty($result['recipe']) && !empty($result['user']))
        {
            return TRUE;
        }
    }

    //Ajoute un article aux favoris de l'utilisateur
    public function addFavorite($_id, $_user2)
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare($sql="INSERT INTO favorite (recipe, user) VALUES (:recipe, :user)");
        $req->execute(array(
            'recipe' => $_id,
            'user' => $_user2
        ));
    }

    //Enlève un article des favoris de l'utilisateur
    public function removeFavorite($_id, $_user2)
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare($sql="DELETE FROM favorite WHERE recipe = :recipe AND user = :user");
        $req->execute(array(
            'recipe' => $_id,
            'user' => $_user2
        ));
    }

    //Récupère dans la bdd tous les articles ajoutés en favoris par l'utilisateur
    public function getAllFavorites($_user2)
    {
        $requete = $this->getBdd()->prepare('SELECT recipe.id AS "recipe_id", recipe.title, recipe.content, recipe.image, recipe.duree, recipe.persons, recipe.user, ingredient.id AS "ingredient_id", ingredient.name, ingredient.unit, recipeingredient.recipe AS "recipeId", recipeingredient.ingredient AS "ingredientId", recipeingredient.quantity FROM `recipeingredient`INNER JOIN `recipe` ON `recipe`.id = `recipeingredient`.recipe INNER JOIN `ingredient` ON `ingredient`.id = `recipeingredient`.ingredient INNER JOIN favorite WHERE recipe.id = favorite.recipe AND favorite.user = :user');
        $requete->execute(array(
            'user' => $_user2
        ));
        $req = $requete->fetchAll();
        return $req;
    }

    //Exporte au format PDF une recette en prenant son id comme paramètre
    public function exportPDF($_id)
    {
        $bdd = new bdd();

        $sql = 'SELECT recipe.id AS "recipe_id", recipe.title, recipe.content, recipe.image, recipe.duree, recipe.persons,
        recipe.user, ingredient.id AS "ingredient_id", ingredient.name, ingredient.unit, recipeingredient.recipe AS "recipeId",
        recipeingredient.ingredient AS "ingredientId", recipeingredient.quantity 
        FROM `recipeingredient` INNER JOIN `recipe` ON `recipe`.id = `recipeingredient`.recipe 
        INNER JOIN `ingredient` ON `ingredient`.id = `recipeingredient`.ingredient WHERE recipe.id = :id';

        $traitement = $bdd->getBdd()->prepare($sql);
        $traitement->bindValue(":id", $_id);
        $traitement->execute();

        $data = $traitement->fetch();
        $title = $data['title'];
        $content = $data['content'];
        $image = $data['image'];
        $duree = $data['duree'];
        $persons = $data['persons'];
        $name = $data['name'];
        $quantity = $data['quantity'];
        $unit = $data['unit'];
        //$user = $user['user'];
        $path_image = (__DIR__ . '\\img\\'. $image);

        //Création d'un nouveau fichier .html temporaire pour accueillir du code html.
        $htmlFile = $title . ".html";
        $fh = fopen($htmlFile, 'w');

        //On ajoute le code HTML à afficher, correspondant à la recette actuelle.
        $stringData = "
        <head>
            <link href=\"https://unpkg.com/tailwindcss@%5E1.0/dist/tailwind.min.css\" rel=\"stylesheet\">
        </head>
        
        <body>
        
        <p class=\"font-bold text-3xl text-gray-800 mb-6 mt-6\">$title</div>
        
        <div><img class= \"w-64\" src=" . $path_image . "></div>

        <div><p>Contenu de la recette :</p>$content</div>

        <div><p>Temps de préparation :</p>$duree</div>

        <div><p>Nombre de personnes :</p>$persons</div>
        
         <div><p>Ingredients :</p>$name</div>

        <div><p>Quantité pour l'ingredient :</p>$quantity</div>
        
        <div><p>L'unité :</p>$unit</div>
        
        </body>
        ";

        fwrite($fh, $stringData);
        fclose($fh);

        //Récupère le fichier html créé plus haut pour le mettre dans un fichier PDF avec Dompdf
        //Penser à télécharger Dompdf via composer dans la racine du projet -> composer require dompdf/dompdf
        $html = file_get_contents(__DIR__ . '\\' . $title . '.html');
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setBasePath('/../');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();
        $dompdf->stream($title);

        //Supprime le fichier HTML
        unlink($htmlFile);
    }

}