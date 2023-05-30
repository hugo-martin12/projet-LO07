<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
      <h3 style="color: red;">Affichage des patients et de leur rendez-vous par Praticien</h3><br/>
      <?php 
        $currentUser = $_SESSION['currentUser'];
        if($currentUser=="vide"){
            echo "<p>Vous devez être administrateur pour voir ces données confidentielles</p></br>";
        }
        else{    
        $valeur = $currentUser[0]->getStatut();
        if($valeur == 0){
            echo "<p>Ici on va avoir la liste des des patients et de leur rendez-vous group by le praticien responsable du rendez-vous. Pour faire ca Nous utilisons du renommage en sql pour afficher des inforamtions distincts du meme table. Ensuite pour clarifier grandement le resultat nous n'affichons pas les informations déjà aficher sur une ligne précedente. </p></br>";
            echo "<table class = \"table table-striped table-bordered\">";
            echo "<thead><tr>";
                echo "<th scope = \"col\">Nom et Prénom Praticien</th>";
                echo "<th scope = \"col\">Spécialité</th>";
                echo "<th scope = \"col\">Nom et Prénom Patient</th>";
                echo "<th scope = \"col\">Rendez-vous et horraire</th>";
              echo "</tr></thead><tbody>";
                
                $tempPraticien = "";
                $tempPatient = "";
                foreach ($results as $element) {
                    
                    $nomPraticien = $element[0];
                    $nomPraticien = utf8_encode($nomPraticien);
                    
                    $prenomPraticien = $element[1];
                    $prenomPraticien = utf8_encode($prenomPraticien);
                    
                    $specialitePraticien = $element[2];
                    $specialitePraticien = utf8_encode($specialitePraticien);
                    
                    $nomPatient = $element[3];
                    $nomPatient = utf8_encode($nomPatient);
                    
                    $prenomPatient = $element[4];
                    $prenomPatient = utf8_encode($prenomPatient);
                    
                    $rdv = $element[5];
                    $rdv = utf8_encode($rdv);
                    
                    $currentPraticien = $nomPraticien . " " . $prenomPraticien;
                    $currentPatient = $nomPatient . " " . $prenomPatient;
                    if($currentPraticien == $tempPraticien){
                       echo "<tr>";
                       echo "<td> </td>";
                       echo "<td> </td>";
                       if($currentPatient == $tempPatient){
                          echo "<td> </td>";
                          echo "<td> $rdv </td>";
                       }
                       else{
                           echo "<td> $currentPatient </td>";
                           echo "<td> $rdv </td>";
                           
                       }
                       echo "</tr>";
                    }
                    else{
                      echo "<tr>";
                      echo "<td> $currentPraticien </td>";
                      echo "<td> $specialitePraticien </td>";
                      echo "<td> $currentPatient </td>";
                      echo "<td> $rdv </td>";
                      echo "</tr>";
                    }
                    
                    
                    $tempPatient = $currentPatient;
                    $tempPraticien = $currentPraticien;
                    
                 
                }
                echo "</tbody></table>";
        }
        else{
            echo "<p>Vous devez être administrateur pour voir ces données confidentielles</p></br>";
        }
                    
        }
            
                ?>
            
    
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>


