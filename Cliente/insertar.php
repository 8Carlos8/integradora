<?php require_once('../Logica/Cliente.php'); ?>
<?php include_once("../Sesion/header.php"); ?>
<?php
$nombre = new Cliente();

if (isset($_POST['id'])) {
    $nombre->insertaRegistro();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registro de Clientes</title>
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
            background-color: #27ae59;
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

        input[type="text"] {
            border: none;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        label {
            color: #3498db;
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
            <h1> Registrar Nuevo Cliente</h1>
        </div>
        <form name="frmInsProd" method="post" action="insertar.php">
            <input type="hidden" name="id" value="0">
            <table class="table">
                <tr>
                    <td>
                        <label class="control-label">Nombre</label>
                        <input type="text" name="nombre" value="" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="control-label">Apellido Paterno</label>
                        <input type="text" name="apellidoP" value="" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="control-label">Apellido Materno</label>
                        <input type="text" name="apellidoM" value="" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="control-label">Telefono</label>
                        <input type="text" name="telefono" value="" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="control-label">Correo</label>
                        <input type="text" name="correo" value="" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group text-center">
                            <a href="../Sesion/Inicio.php" class="btn btn-success">Regresar</a>
                            <button type="submit" class="btn btn-primary"><img src="../images/save.svg">&nbsp;Guardar</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>