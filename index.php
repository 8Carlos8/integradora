<?php
include_once("header.html");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>CodeGlide</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1 class="titulo">CodeGlide</h1>
    </header>

    <section class="gama">
        <div class="contenido-gama">
            <h2>Ubicación</h2>
            <div>

                <p>Santa Ana Xalmimilulco, Puebla</p>
            </div>
            <a class="boton" href="https://goo.gl/maps/EZn29Y9J4UFBD92v6">Ubicación</a>
        </div>
    </section>

    <main class="contenedor sombra">
        <h2>Servicios</h2>
        <div class="servicios">
            <section class="servicio">
                <h3>Desarrollo de Software a Medida</h3>
                <div>
                    <img src="img/1.png">
                </div>
                <p>Ofrecemos desarrollo de software personalizado para satisfacer tus necesidades.</p>
            </section>

            <section class="servicio">
                <h3>Consultoría en Tecnología</h3>
                <div>
                    <img src="img/2.jpg">
                </div>
                <p>Brindamos servicios de consultoría en tecnología para ayudarte a tomar decisiones informadas.</p>
            </section>

            <section class="servicio">
                <h3>Desarrollo de Aplicaciones Web y Móviles</h3>
                <div>
                    <img src="img/3.jpg">
                </div>
                <p>Desarrollamos aplicaciones web y móviles de alta calidad para tu negocio.</p>
            </section>
        </div>
        <br>

        <section>
            <h2>Contáctanos</h2>
            <form class="formulario" action="insertar.php" method="POST">
                <fieldset>
                    <legend>Contáctanos a través de este formulario</legend>
                    <div class="contenedor-campos">
                        <div class="campo">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
                        </div>
                        <div class="campo">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Tu email" required>
                        </div>
                        <div class="campo">
                            <label for="mensaje">Mensaje:</label>
                            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
                        </div>
                        <div class="enviar">
                            <input class="boton" type="submit" value="Enviar">
                        </div>
                    </div>
                </fieldset>
            </form>
        </section>
    </main>

    <footer>
        <center>
            <p>Todos los derechos reservados, &#169 CodeGlide</p>
        </center>
    </footer>
</body>

</html>