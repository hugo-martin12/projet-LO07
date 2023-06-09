<!-- ----- début viewSpecialiteInserted -->
<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
      <div class="form-group">
        <?php
        if(!$exist){
            echo "<br/><h3 style='color: red;'>Spécialité ajoutée !</h3><br/>"; 
        } else {
            echo "<br/><h3 style='color: red;'>La spécialité existe déjà !</h3><br/>"; 
        }
        ?>
        <br/>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">id</th>
                    <th scope = "col">label</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // La liste des spécialités est dans une variable $results
                foreach ($results as $element) {
                    printf("<tr><td>%d</td><td>%s</td></tr>", 
                        $element->getId(), utf8_encode($element->getLabel()));
                }
                ?>
            </tbody>
        </table>
      </div>
  </div>
</body>
    
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
<!-- ----- fin viewSpecialiteInserted -->
