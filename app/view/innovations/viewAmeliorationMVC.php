<?php require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
      <h3 style="color: red;">Explication de l'Amélioration MVC</h3><br/>
      <p>Notre amélioration du MVC va concerner un ensemble de vues similaires</p>
      <p>En effet de nombreuses vues vont seulement afficher un tableau avec des résultats provenant de la base de données. Les seuls changements sont sur le titre, les noms des colonnes et les données en tant que telles. </p></br>
      <p>Nous avons donc choisi de faire un vue générique que nous allons appeler lors qu'une vu basique qaurait du être appeler. Cette vu est stockée dans /view/generique/viewAll.php. 
      Elle va demander 3 choses : </p></br>
      <ul>
          <li> le Titre → informé dans la fonction du controller</li>
          <li> les Noms des colonnes  → envoyés au controller par la fonction du modèle appelé</li>
          <li> les données  → envoyées au controller par la fonction du modèle appelé</li>
      </ul></br>
      <p>Nous appelons donc viewAll.php en mettant dans notre controller ces 3 informations clés pour notre amélioration  </p></br>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

