<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
      <p>Problème : le login est déjà utilisé. Veuillez changer votre login</p></br>
      <form role="form" method='get' action='router2.php'>
        <input type="hidden" name='action' value='connexionInscription'>
      <button class="btn btn-primary" type="submit">revenir en arrière</button>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>


