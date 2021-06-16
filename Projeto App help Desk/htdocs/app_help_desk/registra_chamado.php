<?php

	session_start();

	if($_POST['titulo'] == '' || $_POST['categoria'] == '' || $_POST['descricao'] == ''){
		header('Location: abrir_chamado.php?fill=none');

	}
	else{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		$titulo = str_replace('#', '-', $_POST['titulo']);
		$categoria = str_replace('#', '-', $_POST['categoria']);
		$descricao = str_replace('#', '-', $_POST['descricao']);
		
		$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

		//abrindo o arquivo
		$arquivo = fopen('../../app_help_desk_seguro/arquivo.txt', 'a');

		//inserindo o texto(descriçao) no arquivo
		fwrite($arquivo, $texto);

		//fechando o arquiivo
		fclose($arquivo);

		//redirecionando 
		header('Location: abrir_chamado.php');
	}
	



?>