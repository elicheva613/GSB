<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$pdo = PdoGsb::getPdoGsb();
?>
 

<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title> 
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./styles/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="./styles/style.css" rel="stylesheet">
    </head>
    <body>
       
        <div class="container">
            
            
                <div class="row vertical-align">
                    <div class="col-md-4">
                        <h1>
                            <img src="./images/logo.jpg" class="img-responsive" 
                                 alt="Laboratoire Galaxy-Swiss Bourdin" 
                                 title="Laboratoire Galaxy-Swiss Bourdin">
                        </h1>
                    </div>
                    <div class="col-md-8">
                        <ul class="nav nav-pills pull-right" role="tablist">
                            <li <?php if (!$uc || $uc == 'accueilcomptable') { ?>class="active" <?php } ?>>
                                <a href="index.php?uc=comptable">
                                    <span class="glyphicon glyphicon-home"></span>
                                    Accueil
                                </a>
                            </li>
                            <li <?php if (!$uc || $uc == 'accueilcomptable') { ?>class="active" <?php } ?>>
                                <a href="index.php?uc=validerfrais&action=selectionnerVisiteur">
                                    <span class="glyphicon glyphicon-ok"></span>
                                      Valider la fiche de frais
                                </a>
                                  
                                
                            </li<?php if (!$uc || $uc == 'accueilcomptable') { ?>class="active" <?php } ?>>
                                <a href="index.php?uc=suivrepaiement&action=selectionnerVisiteur">
                                    <span class="glyphicon glyphicon-euro"></span>
                                  Suivre le paiement des fiches de frais
                                </a>
                            <li>   
                                    
                            
                            </li>
                            <li <?php if ($uc == 'deconnexion') { ?>class="active"<?php } ?>>
                                <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    Déconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
           </div>
 <div id="comptable">
<h2>
        Suivi des frais<small> - Comptable : 
            <?php 
            echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']
            ?></small>
    </h2>
    </div>


<div class="row">

     <div class="col-md-4">
         <form action="index.php?uc=suivrepaiement&action=selectionnermois"
              method="post" role="form">
           <label for="visiteur" accesskey="n">Choisir un visiteur: : </label>
            
                    <select id="visiteur" name="visiteur">
                       
                         <?php
                        for($i=0;$i<count($vas);$i++)
                        {   
?>
                        <option value=<?php echo $vas[$i]['id'];?> >
                            <?php echo $vas[$i]['nom']." ".$vas[$i]['prenom'];?> </option>
                        <?php
                        }
                        ?>
                    </select>
     </div>
</div>
        <div class="col-md-4">
             
        <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
             </form>
        </div>
        
