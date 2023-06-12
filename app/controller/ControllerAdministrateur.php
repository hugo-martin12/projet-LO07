<!-- ----- debut ControllerAdministrateur -->
<?php

require_once '../model/ModelPersonne.php';

class ControllerAdministrateur {
    
    public static function adminListeSpecialites() {
        session_start();
        $results = ModelSpecialite::getAll();
        $title = "Liste des spécialités";
        include 'config.php';
        $vue = $root . 'app/view/generique/viewAll.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminListeSpecialites : vue = $vue");
        }
        require ($vue);
    }
   
    public static function adminSpecialiteReadId() {
        // Permet d'obtenir la liste des spécialités
        session_start();
        $results = ModelSpecialite::getAllId();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewId.php';
        require ($vue);
    }
   
    public static function adminSpecialiteReadOne() {
        // Permet d'afficher une spécialité grace à son id
        session_start();
        $id = $_GET['id'];
        $results = ModelSpecialite::getOne($id);
        $title = "Affichage de la spécialité";
        include 'config.php';
        $vue = $root . '/app/view/generique/viewAll.php';
        require ($vue);
    }
   
    public static function adminSpecialiteInsert() {
        // Permet d'afficher la vue pour inserer une spécialité
        session_start();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewSpecialiteInsert.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminSpecialiteInsert : vue = $vue");
        }
        require ($vue);
    }
   
    public static function adminSpecialiteInserted() {
        // Gère l'affichage apres l'ajout ainsi que l'ajout dans la bd
        session_start();
        $label = $_GET['label'];
        //verifie si la spécialité existe ou non
        $exist = ModelSpecialite::ifExisteSpecialite($label);
        $title = "La spécialité existe déjà !";
        if (!$exist){
            ModelSpecialite::InsertSpecialite($label);
            $title = "Spécialité insérée !";
        }
        $results = ModelSpecialite::getAll();
        include 'config.php';
        $vue = $root . 'app/view/generique/viewAll.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminSpecialiteInserted : vue = $vue");
        }
        require ($vue);
    }

    public static function adminListePraticiens() {
        //Permet d'afficher la liste des praticiens 
        session_start();
        $results = ModelPersonne::getAllPraticiensSpecialites();
        $title = "Liste des praticiens";
        include 'config.php';
        $vue = $root . 'app/view/generique/viewAll.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminListePraticiens : vue = $vue");
        }
        require ($vue);
    }
    
    public static function adminNbrPraticiensPatient() {
        //Permet d'afficher le nombre de praticien par patient
        session_start();
        $results = ModelPersonne::getNbrPraticiensPatient();
        $title = "Nombre de praticiens par patient";
        include 'config.php';
        $vue = $root . 'app/view/generique/viewAll.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminNbrPraticiensPatient : vue = $vue");
        }
        require ($vue);
    }
    
    public static function adminInfo() {
        //Permet d'afficher l'e nombre de praticien par patient l'ensemble des informations voulu 
        session_start();
        $results1 = ModelSpecialite::getAll();
        $title1 = "Liste des spécialités";
        $results2 = ModelPersonne::getPraticiens();
        $title2 = "Liste des praticiens";
        $results3 = ModelPersonne::getPatients();
        $title3 = "Liste des patients";
        $results4 = ModelPersonne::getAdministrateurs();
        $title4 = "Liste des administrateurs";
        $results5 = ModelRendezvous::getAll();
        //print_r($results5);
        $title5 = "Liste des rdv";
        $results = [$results1, $results2, $results3, $results4, $results5];
        $title = [$title1, $title2, $title3, $title4, $title5];
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewInfo.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminInfo : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerAdministrateur -->