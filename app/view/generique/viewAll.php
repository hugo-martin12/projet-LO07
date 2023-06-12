<!-- ----- début viewAll -->
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
        <h3 style="color: red;"><?php echo $title; ?></h3><br/>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr class="table-dark">
                    <?php
                    foreach ($results[0] as $element) {
                        echo "<th scope = 'col'>$element</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results[1] as $element) {
                    echo "<tr class=\"table-light\">";
                    foreach ($element as $value) {
                        printf("<td>%s</td>", utf8_encode($value));
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br/> 
    </div>
</div>
</body>
<?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewAll -->