<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';?>
      <div class="form-group">
        <h3 style="color: red;">Liste des Rendez-vous</h3><br/>
        
        <table class = "table table-striped table-bordered">
            <thead>
              <tr class="table-dark">
                <th scope = "col">RDV</th>
                <th scope = "col">Nom</th>
                <th scope = "col">Prenom</th>
              </tr>
            </thead>
            <tbody>
                <?php
                // La liste des vins est dans une variable $results             
                foreach ($results as $element) {
                    $rdv = $element[0];
                    $rdv = utf8_encode($rdv);
                    $nom = $element[1];
                    $nom = utf8_encode($nom);
                    $prenom = $element[2];
                    $prenom = utf8_encode($prenom);
                 printf("<tr class=\"table-light\"><td>%s</td><td>%s</td><td>%s</td></tr>", $rdv,$nom,$prenom);
                }
                ?>
            </tbody>
          </table>
           <br/> 
      </div>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

