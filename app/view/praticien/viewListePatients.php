<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';?>
      <div class="form-group">
        <h3 style="color: red;">Liste des Patients</h3><br/>
        
        <table class = "table table-striped table-bordered">
            <thead>
              <tr>
                <th scope = "col">Nom</th>
                <th scope = "col">Prenom</th>
                <th scope = "col">adresse</th>
              </tr>
            </thead>
            <tbody>
                <?php
                // La liste des vins est dans une variable $results             
                foreach ($results as $element) {
                    $adresse = $element[2];
                    $adresse = utf8_encode($adresse);
                    $nom = $element[0];
                    $nom = utf8_encode($nom);
                    $prenom = $element[1];
                    $prenom = utf8_encode($prenom);
                 printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",$nom,$prenom,$adresse);
                }
                ?>
            </tbody>
          </table>
           <br/> 
      </div>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

