<?php
	
	$acao = 'home';
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
			//script copiado para facilitar o desenvolvimento pois as funcoes de formatação onclick precisam desse script

			function editar(id, txt_tarefa){
				//criar um form de edição
				let  form = document.createElement('form');
				// o action precisa ser alterado para uma pagina correspondente (index) e mais um parametro é passado para o controller para que possamos fazer uma formataç~çao de redirecionamento nele

				form.action = "index.php?pag=index&acao=atualizar";
				form.method = "POST";

				
				let inputTarefa = document.createElement('input');
				inputTarefa.type = "text";
				inputTarefa.name = "tarefa";
				inputTarefa.className = "form-control";
				inputTarefa.value = txt_tarefa;


				
				let inputID = document.createElement('input');
				inputID.type = "hidden";
				inputID.name = "id";
				inputID.value = id;

				
				let button = document.createElement('button');
				button.type = "submit";
				button.className = "btn btn-info";
				button.innerHTML = "Atualizar";


				

				form.appendChild(inputTarefa);
				form.appendChild(inputID);
				form.appendChild(button);

				//o id da div deve existir pois será usado aqui novamente
				let tarefa = document.getElementById('tarefa_'+id);

				//caso não exista dará um erro aqui
				tarefa.innerHTML = '';

				
				tarefa.insertBefore(form, tarefa[0]);

			}

			function remover(id){
				//alterando o endereço para o da pagina atual válida (index) e pasango mais um parametro pag para auxiliar no redirecionamento
				location.href = 'index.php?pag=index&acao=remover&id=' + id;

			}

			function marcarRealizada(id){
				//alterando o endereço para o da pagina atual válida (index) e pasango mais um parametro pag para auxiliar no redirecionamento
				location.href = 'index.php?pag=index&acao=realizar&id=' + id;
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
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />

								<? foreach($tarefa as $indice => $tarefa) { 
									//filtra todas as tarerfas que não são realizaadas
									if($tarefa->status == 'pendente'){

								?>

									<div class="row mb-3 d-flex align-items-center tarefa">
										<!--Mantem o ID DA DIV!!!!! -->
										<div class="col-sm-9" id="tarefa_<?=$tarefa->id ?>" ><?= $tarefa->tarefa ?></div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
										</div>
									</div>


								<? 
									} }
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>