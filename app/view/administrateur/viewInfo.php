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

    <?php
    for ($i = 0; $i < 5; $i++) {
        echo '<div class="form-group">';
        echo '<h3 style="color: red;">'.$title[$i].'</h3><br/>';
        echo '<table class = "table table-striped table-bordered">';
        echo '<thead>';
        echo '<tr class="table-dark">';
        foreach ($results[$i][0] as $element) {
            echo "<th scope = 'col'>$element</th>";
        }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($results[$i][1] as $element) {
            echo "<tr class=\"table-light\">";
            foreach ($element as $value) {
                printf("<td>%s</td>", utf8_encode($value));
            }
            echo "</tr>";
        }
        echo '</tbody>';
        echo '</table>';
        echo '<br/>';
        echo '</div>';
    }
    ?>
</div>
</body>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInfo -->