<?php require_once('../Logica/Evento.php');?>
<?php include_once("../Sesion/header.php");?>
<?php 

$evento = new Evento();

if (isset($_POST['id'])) {
    $evento->actualizaRegistro();
} else {
    $evento->id = $_GET['id'];
    $evento->recuperaRegistro($evento->id);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            background-color: #2ecc71;
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

        .form-control {
            border-radius: 10px;
            border: 1px solid #3498db;
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
    <form name="frmModProd" method="post" action="modificar.php">
        <input type="hidden" name="id" value="<?=$evento->id?>">
        <table class="table">
            <tr>
                <td>
                    <label class="control-label">Nombre</label>
                    <input type="text" name="nombre" value="<?=$evento->nombre?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label">Fecha y hora de Entrada</label>
                    <br>
                    <label class="control-label">Por favor ingrese la fecha en este formato: 2023-07-20 13:39:09</label>
                    <input type="text" name="fecha_horaE" value="<?=$evento->fecha_horaE?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label">Fecha y hora de Salida</label>
                    <input type="text" name="fecha_horaS" value="<?=$evento->fecha_horaS?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label">Costo</label>
                    <input type="num" name="costo" value="<?=$evento->costo?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label">Capacidad</label>
                    <input type="num" name="capacidad" value="<?=$evento->capacidad?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group text-center">
                        <a href="indexA.php" class="btn btn-success">Regresar</a>
                        <button type="submit" class="btn btn-primary"><img src="../images/save.svg">&nbsp;Guardar</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
