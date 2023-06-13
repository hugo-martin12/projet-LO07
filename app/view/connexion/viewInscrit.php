<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
      <?php 
        echo ("<h3>Le nouveau utilisateur a été ajouté </h3>");
        echo("<ul>");
        echo ("<li>id = " . $results . "</li>");
        echo ("<li>nom = " . $_GET['nom'] . "</li>");
        echo ("<li>prenom = " . $_GET['prenom'] . "</li>");
        echo ("<li>adresse = " . $_GET['adresse'] . "</li>");
        echo ("<li>login = " . $_GET['login'] . "</li>");
        echo ("<li>password = " . $_GET['password'] . "</li>");
        echo ("<li>statut = " . $sta . "</li>");
        echo ("<li>specialite_id = " . utf8_encode($specialite_id) . "</li>");
        echo("</ul></br>");
      ?>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>


