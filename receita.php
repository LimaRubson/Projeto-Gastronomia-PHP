<?php
class Conexao {
	private $host = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $banco = "pidev2016";
	private $con = null;
	
	public function connect() {
		$this->con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco);

		if (mysqli_connect_errno($this->con)) {
			echo "Aconteceu o seguinte erro: " . mysqli_connect_error();
		} else {
			return $this->con;
		}
	}
	
	public function desconect() {
		if ($this->con) {
			mysqli_close($this->con);
		}
	}
	
}


 
class torta {
	public $id;
	public $prato;
	public $valor;
	public $receita;
}
  
  
  class tortaDAO {
  	private $com;
	
	public function __construct() {
		$conexao = new Conexao();
		$this->com = $conexao->connect();
	}
	
	public function incluir($objeto) {
		$sql = "INSERT INTO gastronomia (prato, valor, receita) VALUES ('$objeto->prato','$objeto->valor','$objeto->receita');";
		
		mysqli_query($this->com, $sql) or die('Error: ' . mysqli_error($this->com));
	}
	
	public function listar() {
		
		$lista = array();
		$sql = "SELECT * FROM gastronomia;";
		
		$resultado = mysqli_query($this->com, $sql) or die('Error: ' . mysqli_error($this->com));
		if ($resultado->num_rows != 0) {
			$item = 0;
			while ($linha = mysqli_fetch_array($resultado)) {
				
				$obj = new torta();
				$obj->id = $linha[0];
				$obj->prato = $linha[1];
				$obj->valor = $linha[2];
				$obj->receita = $linha[3];
				
				$lista[$item] = $obj;
				$item++;
			}
		}
		return $lista;
	}
	
	public function receita($id) {
		
		$sql = "SELECT * FROM gastronomia WHERE id=" . $id . ";";
		
		$resultado = mysqli_query($this->com, $sql) or die('Error: ' . mysqli_error($this->com));
		
		$obj = new torta();
		$obj->prato = "Receita não encontrada!";
		if ($resultado->num_rows != 0) {
			$item = 0;
			while ($linha = mysqli_fetch_array($resultado)) {
				$obj->id = $linha[0];
				$obj->prato = $linha[1];
				$obj->valor = $linha[2];
				$obj->receita = $linha[3];
			}
		}
		
		return $obj;
		
	}
}
  
  
  $id = $_GET['receita'];
  
  $dao = new tortaDAO();
  $o = $dao->receita($id);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Projeto Integrador Desenvolvimento Web 2016</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="container">

<nav>
  <ul>
    <il><a href="view.listar.php">Voltar</a>
  </ul>
</nav>




<?php
	
echo '<article>';
echo "<h2>Receita Completa da TORTA:</h2>";
echo '<p><textarea id="receita">' . $o->receita . '</textarea></p>';
echo '</article>';
	
?>

<footer>
   <pre>Site desenvolvido por Rubson Hebrain.</pre>
</footer>




</div>
	</body>
</html>
