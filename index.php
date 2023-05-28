<!-- ----- debut index -->
<?php
session_start();
$_SESSION['login']='vide';
echo $_SESSION['login'];
header('Location: app/router/router2.php?action=initialisation');
?>

<!-- ----- fin index -->