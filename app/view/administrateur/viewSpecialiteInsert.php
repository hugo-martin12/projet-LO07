<!-- ----- début viewSpecialiteInsert -->
<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
      <form role="form" method='get' action='router2.php'> 
      <div class="form-group">
        <h3 style="color: red;">Création d'une nouvelle spécialité</h3><br/>
        <input type="hidden" name='action' value='adminSpecialiteInserted'>
            <label>label :</label>
            <div style="width: 150px;">
            <input class="form-control" type="text" name="label" required><br/>
            </div>
      <br/>
      <button class="btn btn-primary" type="submit">submit</button>
      <br/> 
      </div>
      </form>
  </div>
</body>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewSpecialiteInsert -->