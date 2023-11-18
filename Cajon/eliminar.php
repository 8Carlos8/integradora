<?php require_once('../Logica/Cajon.php')?>
<?php
$cajon= new Cajon();
if (isset($_GET['id'])) {
    $cajon->eliminaRegistro($_GET['id']);
}

header("Location: index.php");
?>