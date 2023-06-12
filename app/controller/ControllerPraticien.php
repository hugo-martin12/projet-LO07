<!-- ----- debut ControllerPraticien -->
<?php

require_once '../model/ModelRendezvous.php';
require_once '../model/ModelPersonne.php';

class ControllerPraticien {
    
  public static function praticienListeDispo() {
    //permet d'afficher la liste des disponibilité 
    session_start();
    $currentUser = $_SESSION['currentUser'];
    $id = $currentUser[0]->getId();
    $results = ModelRendezvous::getListDispoToId($id);
    $title = "Liste de mes disponibilités";
    include 'config.php';
    $vue = $root . 'app/view/generique/viewAll.php';
    if (DEBUG)
     echo ("ControllerPraticien : praticienListeDispo : vue = $vue");
    require ($vue);
   }
   
  public static function praticienDispoInsert() {
      //permet d'afficher la view pour creer une nouvelle disponibilité
    session_start();
    include 'config.php';
    $vue = $root . 'app/view/praticien/viewDispoInsert.php';
    if (DEBUG)
     echo ("ControllerPraticien : praticienDispoInsert : vue = $vue");
    require ($vue);
   }
   
   public static function praticienDispoInserted() {
       //permet d'informer sur l'ajout ou la présence d'une disponibilité
    session_start();
    $nbRdv = $_GET['nbRdv'];
    $LigneInserée = array();
    $LigneDéjàInserée = array();
    $currentUser = $_SESSION['currentUser'];
    $id_praticien = $currentUser[0]->getId();
    $heure = $_GET['heure'];
    $date = $_GET['date'];
    // traite le fait d'ajouter plusieurs disponibilité à la suite (en fonction du nombre choisi=>$rdv_date)
    for ($i = 1; $i <= $nbRdv; $i++) {
        //afin de mettre le bon format à l'horraire
        $rdv_date = $date." a ".$heure."h00";
        //vérifi si le RDV existe
        $exist = ModelRendezvous::ifExisteRDV($id_praticien,$rdv_date);
        //Permet l'ajout dans un tableau spécifique en fonction de si une disponibilité à déjà été inseré ou non 
        if($exist){
          array_push($LigneDéjàInserée, $rdv_date);
        }
        else{
          $rdv_inseré = ModelRendezvous::InsertRdv($id_praticien,$rdv_date);  
          array_push($LigneInserée, $rdv_inseré);  
        }
        $heure = intval($heure);
        $heure++;
        
    }
    
    include 'config.php';
    $vue = $root . 'app/view/praticien/viewDispoInserted.php';
    
    if (DEBUG)
     echo ("ControllerPraticien : praticienDispoInserted : vue = $vue");
    require ($vue);
   }
   
   public static function praticienListeRDV() {
      //Permet d'afficher la liste des RDV
    session_start();
    $currentUser = $_SESSION['currentUser'];
    $id_praticien = $currentUser[0]->getId();
    $results = ModelRendezvous::getListRDVToId($id_praticien);
    $title = "Liste de mes rendez-vous";
    include 'config.php';
    $vue = $root . 'app/view/generique/viewAll.php';
    if (DEBUG)
     echo ("ControllerPraticien : praticienListeRDV : vue = $vue");
    require ($vue);
   }

   public static function praticienListePatients() {
    //Permet d'afficher la liste des patients liés au praticien
    session_start();
    $currentUser = $_SESSION['currentUser'];
    $id_praticien = $currentUser[0]->getId();
    $results = ModelRendezvous::getListPatientToId($id_praticien);
    $title = "Liste de mes patients";
    include 'config.php';
    $vue = $root . 'app/view/generique/viewAll.php';
    if (DEBUG)
     echo ("ControllerPraticien : praticienListePatients : vue = $vue");
    require ($vue);
   }
    
}
?>
<!-- ----- fin ControllerPraticien -->