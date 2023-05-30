<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>
<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
    
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
          <h3 style="color: red;">Fomulaire Inscription</h3><br/>
        <input type="hidden" name='action' value='connexionInscrit'>
        <label style='width:8%' for="id">Nom :    </label> <input type="text" name='nom' size='15' style='margin:2px' required> <br/>
        <label style='width:8%' for="id">Prenom :    </label> <input type="text" name='prenom' size='15' style='margin:2px' required> <br/>
        <label style='width:8%' for="id">Adresse :    </label> <input type="text" name='adresse' size='15' style='margin:2px' required> <br/>     
        <label style='width:8%' for="id">login :    </label> <input type="text" name='login' size='15' style='margin:2px' required> <br/>
        <label style='width:8%' for="id">password : </label> <input type="password" name='password' size='15' style='margin:2px' required> <br/>
        <label>Votre statut :</label></br>
            <select name="statut" class="form-select">
                <option value=2>patient</option>
                <option value=1>praticien</option>
                <option value=0>administrateur</option>
            </select> 
        
        <label>Votre spécialité si vous etes praticien :</label></br>
        <select name="specialite_id" class="form-select" >
            <?php
                foreach ($results as $element) {
                    $test = $element->getLabel();
                    $test = utf8_encode($test);
                 printf("<option value=%d >%s</option>", $element->getId(),$test);
                }
            ?>
            </select> 
      </div>
      <br/>
      <button class="btn btn-primary" type="submit">submit</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

