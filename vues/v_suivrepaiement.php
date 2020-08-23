<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
                                <a href="index.php?uc=validerfrais&action=validerfrais">
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
     
        </div>
        
         <div class="row">
    <div class="col-md-4">
        <h3>Sélectionner un mois : </h3>
    </div>
    <div class="col-md-4">
        <form action="index.php?uc=suivrepaiement&action=voir" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstMois" accesskey="n">Mois : </label>
    <input id="idvisiteur" name="visiteur" type="hidden" value="<?php echo $levisiteur?> ">
                <select id="lstMois" name="lstMois" class="form-control">
                     <?php
                        for($i=0;$i<count($mois);$i++)
                        {   
?>
                        <option value='<?php echo $mois[$i]['mois'];?>' >
                            <?php echo $mois[$i]['mois']; ?></option>
                        <?php
                        }
                        ?>
                    

                </select>
            </div>
            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">

        </form>
    </div>
</div>
    </body>
</html>