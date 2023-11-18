<?php require_once('../Logica/Cajon.php') ?>
<?php include_once("../Sesion/header.php"); ?>
<?php
$cajon = new Cajon();
$cajones = $cajon->lista();
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
            <a href="insertar.php" class="btn btn-success">Registrar Nuevo Cajón</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Estado del Cajón</th>
                    <th>Fecha y Hora de Entrada</th>
                    <th>Fecha y Hora de Salida</th>
                    <th>Acciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cajones as $cajon) { ?>
                    <tr>
                        <td><span title="<?= $cajon->id_cliente ?>"><?= $cajon->id_cliente ?></span></td>
                        <td><span title="<?= $cajon->estado ?>"><?= $cajon->estado ?></span></td>
                        <td><span title="<?= $cajon->fecha_horaE ?>"><?= $cajon->hora_entrada ?></span></td>
                        <td><span title="<?= $cajon->fecha_horaS ?>"><?= $cajon->hora_salida ?></span></td>
                        <td>
                            <a href="visualizar.php?id=<?= $cajon->id ?>" title="Ver Detalles del Cajón"><img src="../images/view-list.svg"></a>&nbsp;
                            <a href="modificar.php?id=<?= $cajon->id ?>" title="Editar Cajón"><img src="../images/pencil.svg"></a>&nbsp;
                            <a href="#" onClick="confirma('eliminar.php?id=<?= $cajon->id ?>'); return false;" title="Eliminar Cajón"><img src="../images/trash.svg"></a>
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