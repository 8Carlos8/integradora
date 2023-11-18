<?php require_once('../Logica/Evento.php');?>
<?php include_once("../Sesion/header.php");?>
<?php
$evento = new Evento();
if ($_GET['id']) {
    $evento->id = $_GET['id'];
    $evento->recuperaRegistro($evento->id);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            background-color: #3498db;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-success {
            background-color: #e74c3c;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #c0392b;
        }

        .table {
            background-color: #ffffff;
            border-radius: 10px;
        }

        th, td {
            color: #2c3e50;
            border: none;
        }

        th {
            background-color: #3498db;
        }

        label {
            color: #3498db;
        }

        span {
            color: #2c3e50;
        }

        .form-group button {
            background-color: #3498db;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #2980b9;
        }

        img {
            width: 20px;
            height: 20px;
            margin: 0 5px;
        }
    </style>
</head>
<body>
<div class="container py-2">
    <div class="form-group text-center">
        <a href="indexA.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de Eventos</a>
    </div>
    <table class="table">
        <tr>
            <td>
                <label class="control-label">Nombre</label>
            </td>
            <td>
                <span><?=$evento->nombre?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label class="control-label">Fecha y hora de Entrada</label>
            </td>
            <td>
                <span><?=$evento->fecha_horaE?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label class="control-label">Fecha y hora de Salida</label>
            </td>
            <td>
                <span><?=$evento->fecha_horaS?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label class="control-label">Costo</label>
            </td>
            <td>
                <span><?=$evento->costo?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label class="control-label">Capacidad</label>
            </td>
            <td>
                <span><?=$evento->capacidad?></span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="form-group text-center">
                    <a href="indexA.php"><button type="button" class="btn btn-primary"><img src="../images/save.svg">&nbsp;Cerrar</button></a>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
