<!-- ----- debut fragmentDoctolibMenu -->
<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router2.php?action=accueil">MARTIN - TORRENT |</a>
    <?php
    $laSession = $_SESSION['login'];
    if($laSession=="vide"){
       echo "<a class='navbar-brand' href='#'>|</a>";
       echo "<a class='navbar-brand' href='#'>|</a>";
       $valeur = 10;
    }
    else{
        $currentUser = $_SESSION['currentUser'];
        $valeur = $currentUser[0]->getStatut();
        $nom = $currentUser[0]->getNom();
        $prenom = $currentUser[0]->getPrenom();
        if($valeur == 0){
           echo "<a class='navbar-brand' href='#'>Administrateur |</a>";
           echo "<a class='navbar-brand' href='#'>$nom $prenom |</a>";
        }
        elseif ($valeur == 1) {
           echo "<a class='navbar-brand' href='#'>Praticien |</a>";
           echo "<a class='navbar-brand' href='#'>$nom $prenom |</a>"; 
        }
        elseif ($valeur == 2) {
           echo "<a class='navbar-brand' href='#'>Patient |</a>";
           echo "<a class='navbar-brand' href='#'>$nom $prenom |</a>"; 
        }

    }
   
    
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
        if($valeur == 0){
           echo "<li class=\"nav-item dropdown\">";
           echo "<a class=\"nav-link dropdown-toggle\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">administrateur</a>";
           echo"<ul class=\"dropdown-menu\">";
                echo"<li><a class=\"dropdown-item\" href='router2.php?action=?'>???</a></li>";
           echo "</ul>";
           echo "</li>";
        }
        elseif ($valeur == 1) {
           echo "<li class=\"nav-item dropdown\">";
           echo "<a class=\"nav-link dropdown-toggle\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">praticien</a>";
           echo"<ul class=\"dropdown-menu\">";
                echo"<li><a class=\"dropdown-item\" href='router2.php?action=praticienListeDispo'>Liste de mes disponibilités</a></li>";
                echo"<li><a class=\"dropdown-item\" href='router2.php?action=praticienDispoInsert'>Ajout de nouvelles disponibilités</a></li>";
                echo"<li><hr class=\"dropdown-divider\"></li>";
                echo"<li><a class=\"dropdown-item\" href='router2.php?action=praticienListeRDV'>Liste des rendez-vous avec le nom des patients</a></li>";
                echo"<li><a class=\"dropdown-item\" href='router2.php?action=praticienListePatients'>Liste de mes patients (sans doublon)</a></li>";
           echo "</ul>";
           echo "</li>";
        }
        elseif ($valeur == 2) {
           echo "<li class=\"nav-item dropdown\">";
           echo "<a class=\"nav-link dropdown-toggle\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">patient</a>";
           echo"<ul class=\"dropdown-menu\">";
                echo"<li><a class=\"dropdown-item\" href='router2.php?action=?'>???</a></li>";
           echo "</ul>";
           echo "</li>"; 
        }
        ?>  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href='router2.php?action=fonctionnaliteOriginale'>Fonctionnalité originale</a></li>
            <li><a class="dropdown-item" href='router2.php?action=?'>Amélioration du code MVC</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=connexionLogin">Login</a></li>
            <li><a class="dropdown-item" href="router2.php?action=connexionInscription">S'incrire</a></li>
            <li><a class="dropdown-item" href="router2.php?action=connexionDeconnexion">Deconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentDoctolibMenu -->


