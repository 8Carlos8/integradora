<?php require_once('Modelo.php'); ?>
<?php
class Evento extends Modelo
{
	public $id;
	public $id_cliente;
	public $nombre;
	public $fecha_horaE;
	public $fecha_horaS;
	public $costo;
	public $capacidad;


	function __construct()
	{
		parent::__construct();
		$this->tabla = "evento";
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

			$this->id_cliente = $dato->id_cliente;
			$this->nombre = $dato->nombre;
			$this->fecha_horaE = $dato->fecha_horaE;
			$this->fecha_horaS = $dato->fecha_horaS;
			$this->costo = $dato->costo;
			$this->capacidad = $dato->capacidad;
		}
	}

	function insertaRegistro()
	{

		$this->id = $_POST['id'];
		$this->id_cliente = $_POST['id_cliente'];
		$this->nombre = $_POST['nombre'];
		$this->fecha_horaE = $_POST['fecha_horaE'];
		$this->fecha_horaS = $_POST['fecha_horaS'];
		$this->costo = $_POST['costo'];
		$this->capacidad = $_POST['capacidad'];

		$this->consulta =
			"insert into $this->tabla (id_cliente,nombre,fecha_horaE,fecha_horaS,costo,capacidad) " .
			"values ( " .
			"'$this->id_cliente'," .
			"'$this->nombre'," .
			"'$this->fecha_horaE'," .
			"'$this->fecha_horaS'," .
			"'$this->costo'," .
			"'$this->capacidad' );";

		$this->ejecutaComandoIUD();
	}

	function actualizaRegistro()
	{
		$this->id = $_POST['id'];
		$this->nombre = $_POST['nombre'];
		$this->fecha_horaE = $_POST['fecha_horaE'];
		$this->fecha_horaS = $_POST['fecha_horaS'];
		$this->costo = $_POST['costo'];
		$this->capacidad = $_POST['capacidad'];

		$this->consulta =
			"update $this->tabla set " .
			"id_cliente = '$this->id_cliente'," .
			"nombre = '$this->nombre'," .
			"fecha_horaE = '$this->fecha_horaE'," .
			"fecha_horaS = '$this->fecha_horaS'," .
			"costo = '$this->costo'," .
			"capacidad= '$this->capacidad'" .
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