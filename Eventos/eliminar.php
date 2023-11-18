<?php require_once('../Logica/Evento.php')?>
<?php
$evento= new Evento();
if (isset($_GET['id'])) {
    $evento->eliminaRegistro($_GET['id']);
}

header("Location: indexA.php");
?>