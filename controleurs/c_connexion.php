<?php
/**
 * Gestion de la connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'demandeconnexion';
}


switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $utilisateurs = $pdo->getInfosVisiteur($login, $mdp);
    if (!is_array($utilisateurs)) { //le mdp ou le login est incorrect
        ajouterErreur('Login ou mot de passe incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    } 
    else {
        
        $id = $utilisateurs['id'];
        $nom = $utilisateurs['nom'];
        $prenom = $utilisateurs['prenom'];
        $type = $utilisateurs['type'];
       connecter($id, $nom, $prenom, $type);
        
    }
    if($type==1){
         
        include 'vues/v_accueilcomptable.php';
    }
    else {

        header('location:index.php');
    }
    break;
default:
    include 'vues/v_connexion.php';
    break;
}
