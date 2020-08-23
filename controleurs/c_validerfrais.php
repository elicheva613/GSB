<?php

/* 
* codage validation de frais du projet GSB
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Elicheva Calvo <elicheva.t@gmail.com>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
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
include 'vues/v_valider.php';
break;
        case  'selectionnermois':
            //recupere la donnee de la liste des visiteurs
            $levisiteur = filter_input(INPUT_POST, "visiteur", FILTER_SANITIZE_STRING);
            //var_dump($levisiteur);
            $lesmois=$pdo->getLesMois($levisiteur);
            //var_dump($lesmois);
            $mois=array_values($lesmois);

include 'vues/v_validerfrais.php';
 break;
        case 'voirfichefrais':
            //recuperer les valeurs frais forfaits du visiteur
          $levisiteur= filter_input(INPUT_POST, "visiteur", FILTER_SANITIZE_STRING);
            $lesmois = filter_input(INPUT_POST, "lstMois", FILTER_SANITIZE_STRING);
       $ff= $pdo->getLst($levisiteur,$lesmois);
       $ffe= $pdo->getffetp($levisiteur, $lesmois);
       $ffk= $pdo->getffkm($levisiteur, $lesmois);
       $ffn= $pdo->getffnui($levisiteur, $lesmois);
       $ffr= $pdo->getffrep($levisiteur, $lesmois);
       //var_dump($ffe);
       //$Ffe= array_values($ffe);
      //var_dump($levisiteur);
       //var_dump($lesmois);
       //var_dump($frf);
       $fhf=$pdo->getFraisHF($levisiteur,$lesmois);
       $Fhf=array_values($fhf);
       //var_dump($Fhf);
       
       // comment faire pour voir si le bouton "corriger " est cliquer 
     //   if (isset($_POST['CORRIGER']))
       //{
           
       // appeller une requet de update(parametres qui seront les POST de ton formulaires, dedans tu mettraras jours ta bdd selon l'utilisateur et le mois selectionnes
       //}
       
       // si le bouton reiniatilaiser il aete appuyer alors ju
       
            include 'vues/v_fin.php';
            break;
case'corriger':
    //qd il clique sur corriger il faut que sa change dans la bdd la ligne qui a ete changee du visiteur
    $pdo-> corrigeFrais($levisiteur, $lesmois);
   include 'vues/v_fin.php';
    break;
case'reinitialiser':
    //qd il clique dessus sa doit mettre a zero toutes les donnees du visiteur
    $pdo->reinit($levisiteur, $lesmois);
    include 'vues/v_fin.php';
    break;
case'reporter':
    //qd il clique sa doit mettre le frais selectionne pour le mois d'apres
    include 'vues/v_fin.php';
    break;
case'refuser':
    //qd il clique il faut que le frais ne soit pas pris en compte pour le rmbst et sa doit etre ecrit refuse
    include 'vues/v_fin.php';
    break;
case'valider':
//si valider est clique il faut que ca enregistre la date ou c'est clique et que la fichefrais soit mis a letat VA
break;    
}
   