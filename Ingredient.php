<?php
include_once('bdd.php');

Class Ingredient extends Bdd 
{

	public $_name;
	public $_unit;
	public $_id;
	public $_user;

	public function postingredient ($_name, $_unit) {
		$bdd = new Bdd();
		$sql = 'INSERT INTO ingredient (name,unit) VALUES (:name,:unit)';
		$requete = $bdd->getBdd()->prepare($sql);
		$requete->bindValue(":name", $_name, PDO::PARAM_STR);
		$requete->bindValue(":unit", $_unit, PDO::PARAM_STR);
		$requete->execute();
	}

	public function getallingredient(){
		$reqsql = $this->getBdd()->prepare('SELECT * FROM ingredient');
		$reqsql->execute();
		$re = $reqsql->fetchAll();
		return $re;
	}

	//Ajoute un ingrédient à la shopping list de l'utilisateur connecté
     public function addShoppingList($_id, $_user, $_quantity)
     {
         $bdd = new Bdd();
         $req = $bdd->getBdd()->prepare("INSERT INTO shoppinglist (user, ingredient, quantity) VALUES (:user, :ingredient, :quantity)");
         $req->execute(array(
             'user' => $_user,
             'ingredient' => $_id,
             'quantity' => $_quantity
         ));
     }

    //Met à jour la quantité d'un ingrédient de la shopping list
    public function updateShoppingList($_id, $_quantity, $_user)
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare("UPDATE shoppinglist SET quantity = :quantity WHERE ingredient = :ingredient AND user = :user");
        $req->execute(array(
            'user' => $_user,
            'quantity' => $_quantity,
            'ingredient' => $_id
        ));
    }

    //Enlève un ingrédient à la shopping list de l'utilisateur connecté
    public function removeShoppingList($_id, $_user)
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare("DELETE FROM shoppinglist WHERE ingredient = :ingredient AND user = :user");
        $req->execute(array(
            'ingredient' => $_id,
            'user' => $_user
        ));
    }

    //Vérifie si un ingrédient est déjà présent dans la shopping list
    public function isShoppingList($_id, $_user) : bool
    {
        $bdd = new Bdd();
        $check = $bdd->getBdd()->prepare('SELECT ingredient, user FROM shoppinglist WHERE ingredient = :ingredient AND user = :user');
        $check->execute(array(
            'ingredient' => $_id,
            'user' => $_user
        ));
        $result = $check->fetch();

        if (empty($result['ingredient']) && empty($result['user']))
        {
            return FALSE;
        }
        else if (!empty($result['ingredient']) && !empty($result['user']))
        {
            return TRUE;
        }
    }

    //Récupère les ingrédients de la shopping list
    public function getShoppingList($_user)
    {
          $reqsql = $this->getBdd()->prepare("SELECT * FROM ingredient INNER JOIN shoppinglist WHERE ingredient.id = shoppinglist.ingredient AND shoppinglist.user = :user");
          $reqsql->execute(array(
              'user' => $_user
          ));
          $re = $reqsql->fetchAll();
          return $re;
    }
} 


?>