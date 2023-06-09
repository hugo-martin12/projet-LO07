<!-- ----- début viewListeRdv -->
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
        <h3 style="color: red;">Liste de mes rendez-vous</h3><br/>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">nom</th>
                    <th scope = "col">prénom</th>
                    <th scope = "col">date et heure du rdv</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $element) {
                    printf("<tr><td>%s</td><td>%s</td>"
                            . "<td>%s</td></tr>", 
                            utf8_encode($element[0]),
                            utf8_encode($element[1]),
                            utf8_encode($element[2]));
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewMonCompte -->