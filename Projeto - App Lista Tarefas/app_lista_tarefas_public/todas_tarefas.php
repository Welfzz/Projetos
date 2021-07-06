<?php
	
	$acao = 'recuperar';
	require 'tarefa_controller.php';

?>



<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script>
			function editar(id, txt_tarefa){
				//criar um form de edição
				let  form = document.createElement('form');
				//o action desse form deve enviar para o tarefa controller passando uma acao que indicará a aplicação que se trata de uma atualização de chamado
				form.action = "tarefa_controller.php?acao=atualizar";
				form.method = "POST";

				//criar um input de edição
				let inputTarefa = document.createElement('input');
				inputTarefa.type = "text";
				inputTarefa.name = "tarefa";
				inputTarefa.className = "form-control";
				inputTarefa.value = txt_tarefa;


				//input hidden para guardar o ID da tarefa para que seja enviado para o banco de dados com o submit
				let inputID = document.createElement('input');
				inputID.type = "hidden";
				inputID.name = "id";
				inputID.value = id;

				//criar um botão para o envio do form
				let button = document.createElement('button');
				button.type = "submit";
				button.className = "btn btn-info";
				button.innerHTML = "Atualizar";


				//incluindo os elementos input, input hidden e button no form

				form.appendChild(inputTarefa);
				form.appendChild(inputID);
				form.appendChild(button);

				//selecionando a div de onde serão inseridas as edições atraves do seu ID mesmo que ele se altere
				let tarefa = document.getElementById('tarefa_'+id);

				//limpar o texto para a inclusão do form
				tarefa.innerHTML = '';

				//inclusão do form (insert before adiciona um elemento a uma região do programa quando o usuario interagir com o elemento antes do ponto com a pagina sem recarregar - no caso inseriremos o form no lugar do texto - tarefa.insertBefore(o que sera inserido, indice de acordo com os elementos filhos desse elemento caso existam - tarefa[0]))
				tarefa.insertBefore(form, tarefa[0]);

			}

			function remover(id){
				location.href = 'todas_tarefas.php?acao=remover&id=' + id;

			}

			function marcarRealizada(id){
				location.href = 'todas_tarefas.php?acao=realizar&id=' + id;
			}

		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<? foreach($tarefa as $indice => $tarefa) { ?>
                                    <div class="row mb-3 d-flex align-items-center tarefa">

                                    	<!--adicionando um id para recuperar essa posição no script para que possamos adicionar as formatações programadas do script aqui-->
                                        <div class="col-sm-9" id="tarefa_<?=$tarefa->id ?>" ><?=$tarefa->tarefa?> (<?=$tarefa->status?>)</div>

                                        <div class="col-sm-3 mt-2 d-flex justify-content-between">
                                            <i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>


                                            <? if($tarefa->status == 'pendente') { ?>
	                                            <!--passando paramentros ID da tarefa e TAREFA propriamente dita, porem em forma de texto - entre aspas -->
	                                            <i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
	                                            <i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
	                                        <? } ?>

                                        </div>
                                    </div>
 
                                <? } ?>

								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>