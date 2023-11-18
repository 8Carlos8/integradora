<?php require_once('Modelo.php'); ?>
<?php
class Cliente extends Modelo
{
	public $id;
	public $id_persona;


	function __construct()
	{
		parent::__construct();
		$this->tabla = "cliente";
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

			$this->id_persona = $dato->id_persona;
		}
	}

	function insertaRegistro()
	{

		$this->id = $_POST['id'];
		$this->id_persona = $_POST['id_persona'];

		$this->consulta =
			"insert into $this->tabla (id_persona) " .
			"values ( " .
			"'$this->id_persona' );";

		$this->ejecutaComandoIUD();
	}

	function actualizaRegistro()
	{
		$this->id = $_POST['id'];
		$this->id_persona = $_POST['id_persona'];

		$this->consulta =
			"update $this->tabla set " .
			"id_persona= '$this->id_persona '" .
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