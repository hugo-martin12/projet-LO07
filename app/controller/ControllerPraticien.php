<!-- ----- debut ControllerPraticien -->
<?php

require_once '../model/ModelRendezvous.php';
require_once '../model/ModelPersonne.php';

class ControllerPraticien {
    
  public static function praticienListeDispo() {
    session_start();
    $currentUser = $_SESSION['currentUser'];
    $id = $currentUser[0]->getId();
    $results = ModelRendezvous::getListDispoToId($id);
    include 'config.php';
    $vue = $root . 'app/view/praticien/viewListeDispo.php';
    if (DEBUG)
     echo ("ControllerPraticien : praticienListeDispo : vue = $vue");
    require ($vue);
   }
   
  public static function praticienDispoInsert() {
    session_start();
    include 'config.php';
    $vue = $root . 'app/view/praticien/viewDispoInsert.php';
    if (DEBUG)
     echo ("ControllerPraticien : praticienDispoInsert : vue = $vue");
    require ($vue);
   }
   
   public static function praticienDispoInserted() {
    session_start();
    $nbRdv = $_GET['nbRdv'];
    $LigneInserée = array();
    $LigneDéjàInserée = array();
    $currentUser = $_SESSION['currentUser'];
    $id_praticien = $currentUser[0]->getId();
    $heure = $_GET['heure'];
    $date = $_GET['date'];
    
    for ($i = 1; $i <= $nbRdv; $i++) {
        
        $rdv_date = $date." a ".$heure."h00";
        
        $exist = ModelRendezvous::ifExisteRDV($id_praticien,$rdv_date);
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
    session_start();
    $currentUser = $_SESSION['currentUser'];
    $id_praticien = $currentUser[0]->getId();
    $results = ModelRendezvous::getListRDVToId($id_praticien);
    include 'config.php';
    $vue = $root . 'app/view/praticien/viewListeRDV.php';
    if (DEBUG)
     echo ("ControllerPraticien : praticienListeRDV : vue = $vue");
    require ($vue);
   }

   public static function praticienListePatients() {
    session_start();
    $currentUser = $_SESSION['currentUser'];
    $id_praticien = $currentUser[0]->getId();
    $results = ModelRendezvous::getListPatientToId($id_praticien);
    
    include 'config.php';
    $vue = $root . 'app/view/praticien/viewListePatients.php';
    if (DEBUG)
     echo ("ControllerPraticien : praticienListePatients : vue = $vue");
    require ($vue);
   }
    
}
?>
<!-- ----- fin ControllerPraticien -->