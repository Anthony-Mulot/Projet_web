<?php

include_once('bdd.php');

class User extends Bdd
{
    private $_login;
    private $_password;
    private $_email;
    private $_id;
    private $_isAdmin;

    public function connection($password, $email)
    {
        $bdd = new bdd();

        $traitement = $bdd->getBdd()->prepare($sql = "SELECT * FROM user WHERE password = :password and email = :email");
        $traitement->bindValue("password", $password = hash("sha1", $password), PDO::PARAM_STR);
        $traitement->bindValue("email", $email, PDO::PARAM_STR);
        $traitement->execute();
        $data = $traitement->fetchAll();
        $bidule = $traitement->rowCount();
        if ($bidule >= 1) {
            if (session_id() == "") {
                session_start();

            }
            $_SESSION["id"] = $data[0]["id"];
            $_SESSION["login"] = $data[0]["login"];

            return $data;
        } else {
            echo "aucun utilisateur en ligne";
        }
    }

    public function inscription($login, $password, $email)
    {
        $bdd = new Bdd();
        $password = hash("sha1", $password);
        $sql = 'INSERT INTO user (login,password,email) VALUES (:login,:password,:email)';
        $requete = $bdd->getBdd()->prepare($sql);
        $requete->bindValue(":login", $login, PDO::PARAM_STR);
        $requete->bindValue(":password", $password, PDO::PARAM_STR);
        $requete->bindValue(":email", $email, PDO::PARAM_STR);
        $requete->execute();
    }

    public function getAllUsers()
    {
        $reqsql = $this->getBdd()->prepare('SELECT id, login, isAdmin FROM user ORDER BY user.id ASC');
        $reqsql->execute();
        $re = $reqsql->fetchAll();
        return $re;
    }

    //Ajoute les droits admin
    public function setAdmin($id)
    {
        $bdd = new Bdd();
        $sql = 'UPDATE user SET isAdmin = 1 WHERE id = :id';
        $requete = $bdd->getBdd()->prepare($sql);
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->execute();
    }

    //Enlève les droits admin
    public function removeAdmin($id)
    {
        $bdd = new Bdd();
        $sql = 'UPDATE user SET isAdmin = 0 WHERE id = :id';
        $requete = $bdd->getBdd()->prepare($sql);
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->execute();
    }

    //Vérifie si l'utilisateur lié au paramètre $id est administrateur
    public function isAdmin($id) : bool
    {
        $bdd = new Bdd();
        $sql = 'SELECT isAdmin FROM user WHERE id = :id';
        $requete = $bdd->getBdd()->prepare($sql);
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetch();

        if ($result['isAdmin'] == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}

?>