<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';?>
      <form role="form" method='get' action='router2.php'> 
      <div class="form-group">
        <h3 style="color: red;">Ajouter des disponibilités</h3><br/>
        <input type="hidden" name='action' value='praticienDispoInserted'>
            <label>Date RDV : </label>
            <div style="width: 150px;">
            <input class="form-control" type="date" name="date" min="2023-05-01" max="2033-05-31" required><br/>
            </div>
            
            <label>Heure RDV : </label><br/>
            <input type="number" min="10" max="21"  value = "10" name="heure"/><label>h </label><br/><br/>
            
             <label>Nombre de RDV : </label>
            <div style="width: 75px;">
            <input class="form-control" type="number" min="1" value = "1" name="nbRdv"/><br/>
            </div>
      <br/>
      <button class="btn btn-primary" type="submit">submit</button>
      <br/> 
      </div>
      </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

