<?php require_once('Modelo.php');?>

<?php

class Sesion extends Modelo {

    public static function autenticar($username, $contrasenia, $rol) {
        try {
            $conn = new self();
            $miconsulta = "SELECT * FROM usuario WHERE user_name = :username AND contraseina = :contrasenia";
            $stmt = $conn->mbd->prepare($miconsulta);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':contrasenia', $contrasenia);
            $stmt->execute();

            $result = $stmt->fetchAll();

            if (count($result) > 0) {
                foreach ($result as $registro) {
                    session_start();
                    $_SESSION["rol"] = $registro['rol'];
                    $_SESSION["id"] =  $registro['id'];
                    $_SESSION["user_name"] = $registro['user_name'];
                    $_SESSION["contraseina"] = $registro['contraseina'];

                    if ($_SESSION["rol"] == '1') {
                        header('Location: Eventos/indexA.php');
                    } elseif ($_SESSION["rol"] == '2') {
                        header('Location: Eventos/indexA.php');
                    } else {
                        header('Location: Eventos/index.php');
                    }
                }
            } else {
                header('Location: index.php?error=1');
            }
        } catch (PDOException $e) {
            header('Location: index.php?error=2');
        }
    }

    public static function autenticarRol($roles) {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        if (!in_array($_SESSION["rol"], $roles)) {
            header('Location: index.php?error=1');
        }
    }

    public static function validarRol($roles) {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        if (in_array($_SESSION["rol"], $roles)) {
            return true;
        }
        return false;
    }

} // fin de la clase
?>
