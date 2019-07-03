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