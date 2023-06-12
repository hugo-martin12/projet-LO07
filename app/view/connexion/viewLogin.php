<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
    
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
          <h3 style="color: red;">Fomulaire Connexion</h3><br/>
        <input type="hidden" name='action' value='connexionLogined'>
        <label style='width:8%' for="id">login :    </label> <input type="text" name='login' size='15' style='margin:2px'> <br/>
        <label style='width:8%' for="id">password : </label> <input type="password" name='password' size='15' style='margin:2px'> <br/>
      </div>
      <br/>
      <button class="btn btn-primary" type="submit">GO</button><br/>
    </form>

  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
