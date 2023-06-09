<!-- ----- début viewPraticiens -->
<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <div class="form-group">
        <h3 style="color: red;">Sélection d'un praticien</h3><br/>
        <form role="form" method='get' action='router2.php'>
            <div class="form-group">
            <input type="hidden" name='action' value='patientReadDispo'>
            <label for="praticien">Praticiens : </label> 
            <select class="form-control" id='praticien' name='praticien' style="width: 250px">
            <?php
            foreach ($results as $praticien) {
                $id = $praticien[0];
                $nom = utf8_encode($praticien[1]);
                $prenom = utf8_encode($praticien[2]);
                echo ("<option value='$id'>$nom $prenom</option>");
            }
            ?>
            </select>
            </div>
        <p/><br/>
      <button class="btn btn-primary" type="submit">submit</button>
    </form>
    </div>
    </div>
</body>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewPraticiens -->