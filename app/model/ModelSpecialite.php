<!-- ----- debut modelSpecialite -->
<?php
require_once 'Model.php';

class ModelSpecialite {
 private $id, $label;
 
 public function __construct($id = NULL,$label= NULL){
    if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
  } 
 }
   function setId($id) {
    $this->id = $id;
    }
    function setLabel($label) {
    $this->label = $label;
    }
    function getId() {
    return $this->id;
    }
    function getLabel() {
    return $this->label;
    }
   public static function getAll() {
    try {
     $database = Model::getInstance();
     $query = "select * from specialite";
     $statement = $database->prepare($query);
     $statement->execute();
     $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
     return $results;
    } catch (PDOException $e) {
     printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
     return NULL;
    }
 }
    public static function getSpecialiteToId($specialite_id) {
        try {
         $database = Model::getInstance();
         
         $query = "select label from specialite where id = :specialite_id;";
         $statement = $database->prepare($query);
         $statement->execute([
           'specialite_id' => $specialite_id
         ]);
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
     }
 

}
?>
<!-- ----- fin modelSpecialite -->