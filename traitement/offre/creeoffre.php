<?php
session_start();
require_once '../../class/Bdd.php';
require_once '../../class/Offre.php';


$bdd = new Bdd();
$offre = new Offre (array(

    'titreoffre'=>$_POST['titreoffre'],
    'description'=>$_POST['description'],
    'datepublication'=>$_POST['datepublication'],
    'typecontrat'=>$_POST['typecontrat'],
    'durecontrat'=>$_POST['durecontrat'],
    'pourvue'=>0,
    'refrepresentant'=>$_SESSION['id_representant']
));

$offre->creeoffre($bdd);

header('Location: ../../index.php');