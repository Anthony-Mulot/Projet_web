<?php

require __DIR__.'/vendor/autoload.php';
use Dompdf\Dompdf;
include_once('bdd.php');
include_once('Recette.php');

$recipe = new Recette();

$recipe -> exportPDF($_GET['id']);

?>