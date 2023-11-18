<?php require_once('Modelo.php'); ?>
<?php
class Cajon extends Modelo{
	public $id;
	public $id_cliente;
	public $estado;
	public $hora_entrada;
	public $hora_salida;

	function __construct(){
		parent::__construct();
		$this->tabla = "cajon";
	}


	function lista(){
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($id){
		$this->consulta = "select * from $this->tabla where id = $id";

		$dato = $this->encuentraUno();

		if (isset($dato)){

			$this->id_cliente = $dato->id_cliente;
			$this->estado = $dato->estado;
			$this->hora_entrada = $dato->hora_entrada;
			$this->hora_salida = $dato->hora_salida;
		}
	}

	function insertaRegistro(){

		$this->id = $_POST['id'];
		$this->id_cliente = $_POST['id_cliente'];
		$this->estado = $_POST['estado'];
		$this->hora_entrada = $_POST['hora_entrada'];
		$this->hora_salida = $_POST['hora_salida'];

		$this->consulta =
			"insert into $this->tabla (id_cliente,estado,hora_entrada,hora_salida) " .
			"values ( " .
			"'$this->id_cliente'," .
			"'$this->estado'," .
			"'$this->hora_entrada'," .
			"'$this->hora_salida');";

		$this->ejecutaComandoIUD();
	}

	function actualizaRegistro(){
		$this->id = $_POST['id'];
        $this->id_cliente=$_POST['id_cliente'];
		$this->estado = $_POST['estado'];
		$this->hora_entrada = $_POST['hora_entrada'];
		$this->hora_salida = $_POST['hora_salida'];

		$this->consulta =
			"update $this->tabla set " .
			"id_cliente = '$this->id_cliente'," .
			"estado = '$this->estado'," .
			"hora_entrada = '$this->hora_entrada'," .
			"hora_salida = '$this->hora_salida'" .
			"where id = $this->id";

		$this->ejecutaComandoIUD();
	}

	function eliminaRegistro($id){
		$this->consulta =
			"delete from $this->tabla " .
			"where id = $id;";

		$this->ejecutaComandoIUD();
	}
}
?>