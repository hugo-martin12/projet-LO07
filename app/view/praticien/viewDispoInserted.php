<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';?>
      <div class="form-group">
        <?php
        if(!empty($LigneInserée)){
        echo "<br/><h3 style='color: red;'>Rdv ajoutées</h3><br/>";
            echo "<table class = 'table table-striped table-bordered'><thead>";
            echo"<tr><th scope = 'col'>Rendez-vous et horraire</th></tr>";
            echo "</thead><tbody>";         
                foreach ($LigneInserée as $element) {
                   $rdv = utf8_encode($element);
                 printf("<tr><td>%s</td></tr>", $rdv);
                }
                
            echo "</tbody></table>";   
        }
        
        if(!empty($LigneDéjàInserée)){
        echo "<br/><h3 style='color: red;'>Rdv déjà présent</h3><br/>";
            echo "<table class = 'table table-striped table-bordered'><thead>";
            echo"<tr><th scope = 'col'>Rendez-vous et horraire</th></tr>";
            echo "</thead><tbody>";         
                foreach ($LigneDéjàInserée as $element) {
                   $rdv = utf8_encode($element);
                 printf("<tr><td>%s</td></tr>", $rdv);
                }
                
            echo "</tbody></table>";   
        }
        ?>
           <br/> 
      </div>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

