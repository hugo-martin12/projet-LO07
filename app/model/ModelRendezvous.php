<!-- ----- debut modelRendezvous -->
<?php
require_once 'Model.php';

class ModelRendezvous {
 private $id, $patient_id, $praticien_id, $rdv_date;
 
 public function __construct($id = NULL,$patient_id= NULL, $praticien_id= NULL, $rdv_date= NULL){
    if (!is_null($id)) {
   $this->id = $id;
   $this->patient_id = $patient_id;
   $this->praticien_id = $praticien_id;
   $this->rdv_date = $rdv_date;
  } 
 }
   function setId($id) {
    $this->id = $id;
    }
    function setPatient_id($patient_id) {
    $this->patient_id = $patient_id;
    }
    function setPraticien_id($praticien_id) {
    $this->praticien_id = $praticien_id;
    }
    function setRdv_date($rdv_date) {
    $this->rdv_date = $rdv_date;
    }
    function getId() {
    return $this->id;
    }
    function getPatient_id() {
    return $this->patient_id;
    }
    function getPraticien_id() {
    return $this->praticien_id;
    }
    function getRdv_date() {
    return $this->rdv_date;
    }

}

?>
<!-- ----- fin modelRendezvous -->