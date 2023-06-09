<!-- ----- début viewInfo -->
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
        <h3 style="color: red;">Liste des spécialités</h3><br/>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">id</th>
                    <th scope = "col">label</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results1 as $element) {
                    printf("<tr><td>%d</td><td>%s</td></tr>", 
                            $element->getId(), utf8_encode($element->getLabel()));
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <div class="form-group">
        <h3 style="color: red;">Liste des praticiens</h3><br/>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">id</th>
                    <th scope = "col">nom</th>
                    <th scope = "col">prénom</th>
                    <th scope = "col">adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results2 as $element) {
                    printf("<tr><td>%d</td><td>%s</td><td>%s</td>"
                            . "<td>%s</td></tr>", 
                            $element[0], 
                            utf8_encode($element[1]),
                            utf8_encode($element[2]),
                            utf8_encode($element[3]));
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <div class="form-group">
        <h3 style="color: red;">Liste des administrateurs</h3><br/>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">id</th>
                    <th scope = "col">nom</th>
                    <th scope = "col">prénom</th>
                    <th scope = "col">adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results3 as $element) {
                    printf("<tr><td>%d</td><td>%s</td><td>%s</td>"
                            . "<td>%s</td></tr>", 
                            $element[0], 
                            utf8_encode($element[1]),
                            utf8_encode($element[2]),
                            utf8_encode($element[3]));
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <div class="form-group">
        <h3 style="color: red;">Liste des patients</h3><br/>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">id</th>
                    <th scope = "col">nom</th>
                    <th scope = "col">prénom</th>
                    <th scope = "col">adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results4 as $element) {
                    printf("<tr><td>%d</td><td>%s</td><td>%s</td>"
                            . "<td>%s</td></tr>", 
                            $element[0], 
                            utf8_encode($element[1]),
                            utf8_encode($element[2]),
                            utf8_encode($element[3]));
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <div class="form-group">
        <h3 style="color: red;">Liste des rdv</h3><br/>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">id</th>
                    <th scope = "col">date et heure</th>
                    <th scope = "col">nom du patient</th>
                    <th scope = "col">prénom du patient</th>
                    <th scope = "col">nom du praticien</th>
                    <th scope = "col">prénom du praticien</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results5 as $element) {
                    printf("<tr><td>%d</td><td>%s</td><td>%s</td>"
                            . "<td>%s</td><td>%s</td><td>%s</td></tr>", 
                            $element[0], 
                            utf8_encode($element[1]),
                            utf8_encode($element[2]),
                            utf8_encode($element[3]),
                            utf8_encode($element[4]),
                            utf8_encode($element[5]));
                }
                ?>
            </tbody>
        </table>
    </div>
    
</div>
</body>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInfo -->