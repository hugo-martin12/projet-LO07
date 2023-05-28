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
      <button class="btn btn-primary" type="submit">GO</button>
    </form>
    <h6>Tableau pour faciliter les connexions</h6> 
          <table class="table">
          <tr class="table">
              <th>statut</th> 
              <th>login</th>
              <th>password</th>
          </tr>
          <tr class="table">
              <td>administrateur</td> 
              <td>boss1</td>
              <td>secret</td>
          </tr>
          <tr class="table">
              <td>praticien</td> 
              <td>pare</td>
              <td>secret</td>
          </tr>
          <tr class="table">
              <td>patient</td> 
              <td>depp</td>
              <td>secret</td>
          </tr>
          </table>

  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
