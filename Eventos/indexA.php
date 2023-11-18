<?php require_once('../Logica/Evento.php') ?>
<?php include_once("../Sesion/header.php"); ?>
<?php
$evento = new Evento();
$eventos = $evento->lista();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de Registros de Eventos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            background-color: #2ecc71;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #27ae60;
        }

        .table {
            background-color: #ffffff;
            border-radius: 10px;
        }

        th,
        td {
            color: #2c3e50;
            border: none;
            padding: 8px 12px;
        }

        th {
            background-color: #f39c12;
        }

        a {
            color: #3498db;
            transition: color 0.3s;
        }

        a:hover {
            color: #2980b9;
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
                window.location.href = miurl;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="form-group text-center">
            <i class="fas fa-folder-plus"></i>
            <a href="insertar.php" class="btn btn-success">Registrar Nuevo Evento</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Nombre del Evento</th>
                    <th>Fecha y Hora de Entrada</th>
                    <th>Fecha y Hora de Salida</th>
                    <th>Costo</th>
                    <th>Capacidad</th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento) { ?>
                    <tr>
                        <td><span title="<?= $evento->id_cliente ?>"><?= $evento->id_cliente ?></span></td>
                        <td><span title="<?= $evento->nombre ?>"><?= $evento->nombre ?></span></td>
                        <td><span title="<?= $evento->fecha_horaE ?>"><?= $evento->fecha_horaE ?></span></td>
                        <td><span title="<?= $evento->fecha_horaS ?>"><?= $evento->fecha_horaS ?></span></td>
                        <td><span title="<?= $evento->costo ?>"><?= $evento->costo ?></span></td>
                        <td><span title="<?= $evento->capacidad ?>"><?= $evento->capacidad ?></span></td>
                        <td>
                            <a href="visualizar.php?id=<?= $evento->id ?>" title="Ver Detalles del Evento"><img src="../images/view-list.svg"></a>&nbsp;
                            <a href="modificar.php?id=<?= $evento->id ?>" title="Editar Evento"><img src="../images/pencil.svg"></a>&nbsp;
                            <a href="#" onClick="confirma('eliminar.php?id=<?= $evento->id ?>'); return false;" title="Eliminar Evento"><img src="../images/trash.svg"></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="form-group text-center">
            <a href="../Sesion/Inicio.php" class="btn btn-success">Regresar</a>
        </div>
    </div>
</body>

</html>