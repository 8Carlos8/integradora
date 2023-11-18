<?php require_once('../Logica/Usuario.php') ?>
<?php include_once("../Sesion/header.php"); ?>
<?php
$usuario = new Usuario();
$usuarios = $usuario->lista();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            background-color: #f39c12;
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

        span {
            color: #2c3e50;
        }

        .form-group button {
            background-color: #f39c12;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #d6890e;
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
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="insertar.php" class="btn btn-success"><img src="../images/add-user.svg">&nbsp;Registrar nuevo Usuario</a>
        </div>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
            <?php
            foreach ($usuarios as $usuario) {
            ?>
                <tr>
                    <td><span title="<?= $usuario->id ?>"><?= $usuario->id ?></span></td>
                    <td><span title="<?= $usuario->user_name ?>"><?= $usuario->user_name ?></span></td>
                    <td><span title="<?= $usuario->contrasenia ?>"><?= $usuario->contrasenia ?></span></td>
                    <td>
                        <a href="modificar.php?id=<?= $usuario->id ?>" title="Editar Usuario"><img src="../images/pencil.svg"></a>
                        <a href="" onClick="confirma('eliminar.php?id=<?= $usuario->id ?>'); return false;" title="Eliminar Usuario"><img src="../images/trash.svg"></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>