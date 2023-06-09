<!-- ----- début viewNbrPraticiensPatient -->
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
        <h3 style="color: red;">Nombre de praticiens par patient</h3><br/>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">id</th>
                    <th scope = "col">nom</th>
                    <th scope = "col">prénom</th>
                    <th scope = "col">adresse</th>
                    <th scope = "col">nombre de praticiens</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $element) {
                    printf("<tr><td>%d</td><td>%s</td><td>%s</td>"
                            . "<td>%s</td><td>%d</td></tr>", 
                            $element[0], 
                            utf8_encode($element[1]),
                            utf8_encode($element[2]),
                            utf8_encode($element[3]),
                            $element[4]);
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewNbrPraticiensPatient -->