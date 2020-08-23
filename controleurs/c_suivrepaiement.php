<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'includes/fct.inc.php';
require_once 'includes/class.pdogsb.inc.php';
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$pdo = PdoGsb::getPdoGsb();
switch ($action){
        case 'selectionnerVisiteur':
$nomprenom=$pdo->getNomVisiteur();
//var_dump($nomprenom);
$np=array_values($nomprenom);
$vas=$np;
//var_dump($vas);
include 'vues/v_sp.php';
break;
        case  'selectionnermois':
            //recupere la donnee de la liste des visiteurs
            $levisiteur = filter_input(INPUT_POST, "visiteur", FILTER_SANITIZE_STRING);
            //var_dump($levisiteur);
            $lesmois=$pdo->getLesMois($levisiteur);
            //var_dump($lesmois);
            $mois=array_values($lesmois);

include 'vues/v_suivrepaiement.php';
 break;

    case'voir':
 //include'vues/v_etatFrais.php';
         $levisiteur= filter_input(INPUT_POST, "visiteur", FILTER_SANITIZE_STRING);
            $lesmois = filter_input(INPUT_POST, "lstMois", FILTER_SANITIZE_STRING);
         $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($levisiteur, $lesmois);
    $lesFraisForfait = $pdo->getLesFraisForfait($levisiteur, $lesmois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($levisiteur, $lesmois);
    $numAnnee = substr($lesmois, 0, 4); //decoute la variale $leMois
    $numMois = substr($lesmois, 4, 2);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    
include'vues/v_suivrepaiement1.php';
break;
}