<!DOCTYPE html>
<html>
	<head>
		<title>Projeto Integrador Desenvolvimento Web 2016</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="container">
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
?>



<header>
  <h1><spam>Mao na Massa<spam></h1>
</header>

<nav>
  <ul>
    <il><a href="view.incluir.php">Incluir</a> | 
    <il><a href="view.listar.php">Listar</a>   | 
    <il><a href="formulario.php">Pedir</a>         | 
    <il><a href="index.php">Voltar</a>	    		
  </ul>
</nav>

<footer>
   <pre>Site desenvolvido por Rubson Hebrain.</pre>
</footer>


		</div>
	</body>
</html>