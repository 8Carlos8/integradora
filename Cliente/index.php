<?php require_once('../Logica/Persona.php') ?>
<?php include_once("../Sesion/header.php"); ?>
<?php
$nombre = new Persona();
$nombres = $nombre->lista();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de Registros de Clientes</title>
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
            background-color: #f39c12;
        }

        a {
            color: #e74c3c;
            transition: color 0.3s;
        }

        a:hover {
            color: #c0392b;
        }

        img {
            width: 20px;
            height: 20px;
            margin: 0 5px;
        }
    </style>
    <script>
        function confirma(miurl) {
            question = confirm("¿Estás seguro de eliminar este elemento?");
            if (question) {
                top.location = miurl;
            }
        }
    </script>
</head>

<body>

    <div class="container">
        <div class="form-group text-center">
            <a href="insertar.php" class="btn btn-success">&nbsp;Registrar Nuevo Cliente</a>
        </div>
        <table class="table table-striped">
            <tr>
                <th align="center">Nombre</th>
                <th align="center">Apellido Paterno</th>
                <th align="center">Apellido Materno</th>
                <th align="center">Teléfono</th>
                <th align="center">Correo</th>
                <th align="center">Acciones</th>
                <th></th>
            </tr>
            <?php
            foreach ($nombres as $nombre) {
            ?>
                <tr>
                    <td align="center"><span title="<?= $nombre->nombre ?>"><?= $nombre->nombre ?></span></td>
                    <td align="center"><span title="<?= $nombre->apellidoP ?>"><?= $nombre->apellidoP ?></span></td>
                    <td align="center"><span title="<?= $nombre->apellidoM ?>"><?= $nombre->apellidoM ?></span></td>
                    <td align="center"><span title="<?= $nombre->telefono ?>"><?= $nombre->telefono ?></span></td>
                    <td align="center"><span title="<?= $nombre->correo ?>"><?= $nombre->correo ?></span></td>
                    <td align="center">
                        <a href="visualizar.php?id=<?= $nombre->id ?>" title="Ver Detalles del Cliente"><img src="../images/view-list.svg"></a>&nbsp;
                        <a href="modificar.php?id=<?= $nombre->id ?>" title="Editar Cliente"><img src="../images/pencil.svg"></a>&nbsp;
                        <a href="#" onClick="confirma('eliminar.php?id=<?= $nombre->id ?>'); return false;" title="Eliminar Cliente"><img src="../images/trash.svg"></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="form-group text-center">
            <a href="../Sesion/Inicio.php" class="btn btn-success">Regresar</a>
        </div>
    </div>
</body>

</html>