<?php require_once('../Logica/Persona.php'); ?>
<?php include_once("../Sesion/header.php"); ?>
<?php
$nombre = new Persona();
if ($_GET['id']) {
    $nombre->id = $_GET['id'];
    $nombre->recuperaRegistro($nombre->id);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Visualizar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            background-color: #122543;
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
            background-color: #27ae60;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #219451;
        }

        .table {
            background-color: #ffffff;
            border-radius: 10px;
        }

        th,
        td {
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
            <h1>Datos del Cliente</h1>
        </div>
        <table class="table">
            <tr>
                <td>
                    <label class="control-label">Nombre</label>
                </td>
                <td>
                    <span><?= $nombre->nombre ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label">Apellido Paterno</label>
                </td>
                <td>
                    <span><?= $nombre->apellidoP ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label">Apellido Materno</label>
                </td>
                <td>
                    <span><?= $nombre->apellidoM ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label">Correo</label>
                </td>
                <td>
                    <span><?= $nombre->correo ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label">Numero Telefonico</label>
                </td>
                <td>
                    <span><?= $nombre->telefono ?></span>
                </td>
            </tr>
        </table>
        <div class="form-group text-center">
            <a href="../Cliente/index.php" class="btn btn-success">Regresar</a>
        </div>
    </div>
</body>

</html>