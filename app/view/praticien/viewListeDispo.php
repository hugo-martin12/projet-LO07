<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';?>
      <div class="form-group">
        <h3 style="color: red;">Liste des disponibilités</h3><br/>
        
        <table class = "table table-striped table-bordered">
            <thead>
              <tr>
                <th scope = "col">Rendez-vous et horraire Disponible</th>
              </tr>
            </thead>
            <tbody>
                <?php
                // La liste des vins est dans une variable $results             
                foreach ($results as $element) {
                    $rdv = $element->getRdv_date();
                    $rdv = utf8_encode($rdv);
                 printf("<tr><td>%s</td></tr>", $rdv);
                }
                ?>
            </tbody>
          </table>
           <br/> 
      </div>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

