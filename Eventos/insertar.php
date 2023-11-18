<?php require_once('../Logica/Evento.php'); ?>
<?php include_once("../Sesion/header.php"); ?>
<?php include_once("../Logica/Cliente.php"); ?>
<?php
$evento = new Evento();
$cliente = new Cliente();

if (isset($_POST['id'])) {
    $evento->insertaRegistro();
    header("Location: indexA.php");
    exit;
}

$lista_C = $cliente->lista();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Insertar Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
    <style>
        body {
            background-color: #363753;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-group text-center">
            <a href="indexA.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de Eventos</a>
        </div>
        <form name="frmInsProd" method="post" action="insertar.php">
            <input type="hidden" name="id" value="0">
            <div class="form-group">
                <label>ID del Cliente</label>
                <select name="id_cliente" class="form-control">
                    <option value="0">Seleccione su ID</option>
                    <?php
                    foreach ($lista_C as $cliente) {
                    ?>
                        <option value="<?= $cliente->id ?>"><?= $cliente->id; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Fecha y hora de Entrada</label>
                <br>
                <label class="control-label">Por favor ingrese la fecha y hora de entrada.</label>
                <div class="input-group">
                    <input type="text" name="fecha_horaE" value="" class="form-control flatpickr" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>ingresa la Fecha y hora de Salida</label>
                <div class="input-group">
                    <input type="text" name="fecha_horaS" value="" class="form-control flatpickr" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Presupuesto</label>
                <input type="text" name="costo" value="" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Capacidad</label>
                <input type="text" name="capacidad" value="" class="form-control" required>
            </div>
            <div class="form-group text-center">
                <a href="../Sesion/Inicio.php" class="btn btn-success">Regresar</a>
                <button type="submit" class="btn btn-primary"><img src="../images/save.svg">&nbsp;Guardar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
    <script>
        flatpickr(".flatpickr", {
            enableTime: true,
            dateFormat: "Y-m-d H:i:S",
            time_24hr: true
        });
    </script>
</body>

</html>