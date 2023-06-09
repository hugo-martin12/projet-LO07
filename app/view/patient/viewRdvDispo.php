<!-- ----- début viewRdvDispo -->
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
        <?php
        if (empty($results)) {
            echo "<h3 style='color: red;'>Pas de rdv disponible pour ce praticien !</h3><br/>";
        } else {
            echo "<h3 style='color: red;'>Sélection d'un rdv</h3><br/>";
            echo "<form role='form' method='get' action='router2.php'>";
            echo "<div class='form-group'>";
            echo "<input type='hidden' name='action' value='patientRdvInserted'>";
            echo "<label for='rdv'>Rendez-vous disponibles : </label>";
            echo "<select class='form-control' id='rdv' name='rdv' style='width: 200px'>";
            foreach ($results as $rdv) {
                $id = $rdv[0];
                $date = utf8_encode($rdv[1]);
                echo ("<option value='$id'>$date</option>");
            }
            echo "</select>";
            echo "</div>";
            echo "<p/><br/>";
            echo "<button class='btn btn-primary' type='submit'>submit</button>";
            echo "</form>";
        }
        ?>
    </div>
    </div>
</body>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewRdvDispo -->