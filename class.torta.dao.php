<?php
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
?>