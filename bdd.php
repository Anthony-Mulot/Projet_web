<?php
Class Bdd
{
	private $_bdd;
	public function __construct()
	
	{
		try
		{
		$bdd = new PDO('mysql:host=localhost;port=3308;dbname=recipedb', 'root', '');
		$this->_bdd = $bdd;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}
	public function getBdd()
	{
		return $this->_bdd;
	}
}
?>