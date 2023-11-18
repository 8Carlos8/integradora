<?php require_once('../Logica/Cliente.php')?>
<?php
$nombre= new Cliente();
if (isset($_GET['id'])) {
    $nombre->eliminaRegistro($_GET['id']);
}

header("Location: index.php");
?>