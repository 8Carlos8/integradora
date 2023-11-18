<?php require_once('Modelo.php'); ?>
<?php
class Persona extends Modelo
{
    public $id;
    public $nombre;
    public $apellidoP;
    public $apellidoM;
    public $telefono;
    public $correo;


    function __construct()
    {
        parent::__construct();
        $this->tabla = "persona";
    }

    function lista()
    {
        $this->consulta = "select * from $this->tabla";

        return $this->encuentraTodos();
    }

    function recuperaRegistro($id)
    {
        $this->consulta = "select * from $this->tabla where id = $id";

        $dato = $this->encuentraUno();

        if (isset($dato)) {

            $this->nombre = $dato->nombre;
            $this->apellidoP = $dato->apellidoP;
            $this->apellidoM = $dato->apellidoM;
            $this->telefono = $dato->telefono;
            $this->correo = $dato->correo;
        }
    }

    function insertaRegistro()
    {

        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->apellidoP = $_POST['apellidoP'];
        $this->apellidoM = $_POST['apellidoM'];
        $this->telefono = $_POST['telefono'];
        $this->correo = $_POST['correo'];

        $this->consulta =
            "insert into $this->tabla (nombre,apellidoP,apellidoM,telefono,correo) " .
            "values ( " .
            "'$this->nombre'," .
            "'$this->apellidoP'," .
            "'$this->apellidoM'," .
            "'$this->telefono'," .
            "'$this->correo' );";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro()
    {
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->apellidoP = $_POST['apellidoP'];
        $this->apellidoM = $_POST['apellidoM'];
        $this->telefono = $_POST['telefono'];
        $this->correo = $_POST['correo'];

        $this->consulta =
            "update $this->tabla set " .
            "nombre = '$this->nombre'," .
            "apellidoP = '$this->apellidoP'," .
            "apellidoM = '$this->apellidoM'," .
            "telefono = '$this->telefono'," .
            "correo= '$this->correo '" .
            "where id = $this->id";

        $this->ejecutaComandoIUD();
    }

    function eliminaRegistro($id)
    {
        $this->consulta =
            "delete from $this->tabla " .
            "where id = $id;";

        $this->ejecutaComandoIUD();
    }
}
?>