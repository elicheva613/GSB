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
                                <a href="index.php?uc=suivrepaiement&action=suivrepaiement">
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
        <h3>Valider la fiche de frais</h3>
        <h4> Elements forfaitisés</h4>
      <?php // faire un formulaire dire c'est quoi la page php qui va recuperer tes donnes du formulaire?>
        <form action="post">     
      <fieldset> 
          <p> Forfait Etape</p>
             <input type="text" value="<?php echo $ffe[0]['quantite'] ?>">
             <p> Frais Kilométrique</p>
              <input type="text" value="<?php echo $ffk[0]['quantite'] ?>">
              <p> Nuitée Hotel</p>
               <input type="text" value="<?php echo $ffn[0]['quantite'] ?>">
               <p> Repas Restaurant</p>
                    <input type="text" value="<?php echo $ffr[0]['quantite'] ?>">
                    <br>
                    <br>
                   <?php //chq fois que je clique dans corriger ca envoie les donnes a une page php?>
                <button class="btn btn-success" type="submit"action="index.php?uc=validerfrais&action=corriger">Corriger</button>
                <button class="btn btn-danger" type="reset" action="index.php?uc=validerfrais&action=reinitialiser" >Reinitialiser</button>
        
      </fieldset>
    </form>
        
        <?php 
       // if($ffe==0 AND $ffk==0 AND $ffn==0 AND $ffr==0 AND $i==0){
         //   echo"ce visiteur n'a pas de fiche pour ce mois";
       // }
        ?>
        
        <hr>
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">Descriptif des éléments hors forfait</div>
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>  
                    <th class="montant">Montant</th>  
                    <th class="action">&nbsp;</th> 

                </tr>
            </thead>  
            <tbody>
            <?php
            for($i=0;$i<count($Fhf);$i++)
     {
             ?>           
                <tr>
                    <td> <?php echo  $Fhf[$i]['date'];?></td>
                    <td> <?php echo $Fhf[$i]['libelle'];?></td>
                    <td><?php echo $Fhf[$i]['montant']; ?></td>
                    <td>
                        <button class="btn btn-success" type="submit"onclick=";">Valider</button>
                <button class="btn btn-danger" type="reset" onclick="return confirm('Refuser les frais?');">Refuser</button>
                <button type="submit"> Reporter </button></td>
                </tr>
                <?php
            }
            ?>
            </tbody>  
        </table>
    </div>
</div>
        Nombres de justificatifs: <input type="box" name="nbjustificatifs" value=<?php echo $i?> />
        <br>
        
        <button class="btn btn-success" type="submit"onclick="return (index.php?uc=validerfrais&action=valider);">Valider</button>
        
        <button class="btn btn-danger" type="reset" onclick="return (index.php?uc=validerfrais&action=reinitialiser);" >Réinitialiser</button>
        
      