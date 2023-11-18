<?php require_once('../Logica/Usuario.php');?>
<?php 

$usuario = new Usuario();

if (isset($_POST['user_name'])) {
    $usuario->actualizaRegistro();
} else {
    if (isset($_GET['user_name'])) {
        $usuario->user_name = $_GET['user_name'];
        $usuario->recuperaUsuario($usuario->user_name);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Usuario</title>
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

        th, td {
            color: #2c3e50;
            border: none;
        }

        th {
            background-color: #f39c12;
        }

        .form-control {
            border-radius: 10px;
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
</head>
<body>

<div class="form-group text-left"  >
    <a href="../Sesion/Inicio.php" class="btn btn-success">Regresar</a>
</div>
                

<div class="container py-2">
    <div class="form-group text-center">
        <h2>Cambia tu Información</h2>
    </div>
    <form name="frmModProd" method="post" action="modificar.php">
        <input type="hidden" name="id" value="<?=$usuario->user_name?>">
        <table class="table">
            <tr>
                <td>
                    <label class="control-label">Usuario</label>
                    <input type="text" name="user_name" value="<?=$usuario->user_name?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label">Contraseña</label>
                    <input type="password" name="contrasenia" value="<?=$usuario->contrasenia?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary"><img src="../images/save.svg">&nbsp;Guardar</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>


