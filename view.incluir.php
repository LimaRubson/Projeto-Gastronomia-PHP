<!DOCTYPE html>
<html>
	<head>
		<title>Projeto Integrador Desenvolvimento Web 2016</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="container">

<header>
  <h1><spam>Mao na Massa</spam></h1>
</header>

<nav>
  <ul>
    <il><a href="view.incluir.php">Incluir</a> | 
    <il><a href="view.listar.php">Listar</a>   | 
    <il><a href="formulario.php">Pedir</a>         |
    <il><a href="index.php">Voltar</a>
    	
  </ul>
</nav>

<section>
  <form method="post" action="control.incluir.php" class="form-actions">
    <p>^_^ { Coloque sua receita aqui! }</p>
    <p><input type="text" name="prato" placeholder="Nome do prato"></p>
    <p><input type="text" name="valor" placeholder="Valor do prato"></p>
	<p><textarea name="receita">Coloque aqui os ingredientes e o modo de preparo.</textarea><br /></p>
    <input type="submit" value="Inserir" />
  </form>
</section>

<footer>
   <pre>Site desenvolvido por Rubson Hebrain.</pre>
</footer>

</div>
	</body>
</html>