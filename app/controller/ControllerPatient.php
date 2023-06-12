<!-- ----- debut ControllerPatient -->
<?php

require_once '../model/ModelPersonne.php';

class ControllerPatient {
    
    public static function patientMonCompte() {
        //Permet d'afficher les informations sur le compte du patient
        session_start();
        $currentUser = $_SESSION['currentUser'];
        $id = $currentUser[0]->getId();
        $results = ModelPersonne::getPatientToId($id);
        include 'config.php';
        $vue = $root . 'app/view/patient/viewMonCompte.php';
        if (DEBUG) {
            echo ("ControllerPatient : patientMonCompte : vue = $vue");
        }
        require ($vue);
    }
    
    public static function patientListeRdv() {
        //Permet d'afficher la liste des RDV
        session_start();
        $currentUser = $_SESSION['currentUser'];
        $id = $currentUser[0]->getId();
        $results = ModelPersonne::getRdvToId($id);
        include 'config.php';
        $vue = $root . 'app/view/patient/viewListeRdv.php';
        if (DEBUG) {
            echo ("ControllerPatient : patientListeRdv : vue = $vue");
        }
        require ($vue);
    }
    
    public static function patientReadPraticiens() {
        //Permet d'afficher la view pour ajouter un RDV
        session_start();
        $results = ModelPersonne::getNomsPraticiens();
        include 'config.php';
        $vue = $root . '/app/view/patient/viewPraticiens.php';
        require ($vue);
    }
    
    public static function patientReadDispo() {
        //Permet d'afficher les disponibilités du praticien selestionné
        session_start();
        $praticien = $_GET['praticien'];
        $results = ModelPersonne::getDispoPraticiensToId($praticien);
        include 'config.php';
        $vue = $root . '/app/view/patient/viewRdvDispo.php';
        require ($vue);
    }
    
    public static function patientRdvInserted() {
        //Gere l'insersion d'un nouvel RDV
        session_start();
        $currentUser = $_SESSION['currentUser'];
        $id_patient = $currentUser[0]->getId();
        $id_rdv = $_GET['rdv'];
        ModelRendezvous::addRdv($id_rdv, $id_patient);
        $results = ModelPersonne::getRdvToId($id_patient);
        include 'config.php';
        $vue = $root . 'app/view/patient/viewListeRdv.php';
        if (DEBUG) {
            echo ("ControllerPatient : patientRdvInserted : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerPatient -->