<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pidev2016";

$conn = mysqli_connect($servername, $username, $password);

/* CHECK CONNECTION */
if (mysqli_connect_errno()) {
    printf("<p style='color: red;'>Conexão falhou: %s\n</p>", mysqli_connect_error());
    exit();
} else {
	printf("<p style='color: blue;'>Conectado ao bando de dados.<p/>");
}

/* DELETE DATABASE IF EXISTS */
if (mysqli_query($conn, "DROP DATABASE IF EXISTS $database")) {
    printf("<p style='color: blue;'>Banco de dados apagado.<p/>");
} else {
	printf("<p style='color: red;'>Não consigo apagar o bando de dados.<p/>" . mysqli_error($conn));
    exit();
}

/* CREATE DATABASE */
if (mysqli_query($conn, "CREATE DATABASE $database")) {
    printf("<p style='color: blue;'>Banco de dados $database criado.<p/>");
} else {
	printf("<p style='color: red;'>Não consigo criar o bando de dados.<p/>" . mysqli_error($conn));
    exit();
}


/* SELECT DATABASE */
if (mysqli_select_db($conn, $database)) {
    printf("<p style='color: blue;'>Banco de dados selecionado.<p/>");
} else {
	printf("<p style='color: red;'>Não consigo selecionar o bando de dados.<p/>" . mysqli_error($conn));
    exit();
}

/* CREATE TABLE BLOG */
$sql = "CREATE TABLE gastronomia (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			prato VARCHAR(255),
			valor FLOAT,
			receita TEXT
		)";

if (mysqli_query($conn, $sql)) {
    printf("<p style='color: blue;'>Tabela blog criada.<p/>");
} else {
	printf("<p style='color: red;'>Não consigo criar a tabela blog.<p/>" . mysqli_error($conn));
    exit();
}
?>