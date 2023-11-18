<?php require_once('Modelo.php'); ?>
<?php
class Usuario extends Modelo
{
	public $id;
	public $contrasenia;
	public $user_name;
	public $rol;


	function __construct()
	{
		parent::__construct();
		$this->tabla = "usuario";
	}

	function lista()
	{
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaUsuario($user_name)
	{
		$this->consulta = "select * from $this->tabla where user_name = '$user_name'";

		$dato = $this->encuentraUno();

		if (isset($dato)) {

			$this->user_name = $dato->user_name;
			$this->contrasenia = $dato->contrasenia;
			$this->rol = $dato->rol;

			$this->ejecutaComandoIUD();
		}
		return (isset($dato));
	}


	function insertaRegistro()
	{

		$this->id = $_POST['id'];
		$this->user_name = $_POST['user_name'];
		$this->contrasenia = $_POST['contrasenia'];




		$this->consulta =
			"insert into $this->tabla (user_name,contrasenia) " .
			"values ( " .
			"'$this->user_name'," .
			"'$this->contrasenia' );";

		$this->ejecutaComandoIUD();
	}

	function actualizaRegistro()
	{
		$this->id = $_POST['id'];
		$this->user_name = $_POST['user_name'];
		$this->contrasenia = $_POST['contrasenia'];

		$this->consulta =
			"update $this->tabla set " .
			"user_name = '$this->user_name'," .
			"contrasenia = '$this->contrasenia'" .
			"where user_name = '$this->user_name'";

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