<?php include_once("header.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            background-color: #f06c6c;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-success {
            background-color: #23c93c;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #1e9c2b;
        }
    </style>
</head>

<body>
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="../Eventos/Insertar.php" class="btn btn-success form-control">Organiza tu Evento</a>
        </div>
    </div>
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="../Eventos/indexA.php" class="btn btn-success form-control">Visualiza tus Eventos</a>
        </div>
    </div>
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="../Cliente/insertar.php" class="btn btn-success form-control">Clientes</a>
        </div>
    </div>
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="../Cliente/index.php" class="btn btn-success form-control">Visualiza tus Clientes</a>
        </div>
    </div>
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="../Cajon/index.php" class="btn btn-success form-control">Cajones</a>
        </div>
    </div>
</body>

</html>