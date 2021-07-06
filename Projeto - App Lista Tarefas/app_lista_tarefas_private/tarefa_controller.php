<?php
		
		require "../../app_lista_tarefas_private/tarefa.model.php";
		require "../../app_lista_tarefas_private/tarefa.service.php";
		require "../../app_lista_tarefas_private/conexao.php";

		$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


		if($acao == 'inserir'){
				//criando um objeto de cada classe de cada arquivo privado
				$tarefa = new Tarefa();
				//setando o valor passado pelo formulario para a variavel tarefa atraves do metodo setter da classe TAREFA

				$tarefa->__set('tarefa', $_POST['tarefa']);


				//criando o resto dos objetos de cada classe
				$conexao = new Conexao();
				//o tarefa service controla toda a manipulação de registros, portanto ele precisa receber diretamente a conexão com o DB e tambem a tarefa que será trabalhada
				$tarefaService = new TarefaService($conexao, $tarefa);
				$tarefaService->inserir();

				header('Location: nova_tarefa.php?inclusao=1');
		}

		else if($acao == 'recuperar'){
			$tarefa = new Tarefa();
			$conexao = new Conexao();
			$tarefaService = new TarefaService($conexao, $tarefa);

			$tarefa = $tarefaService->recuperar();

		}

		else if($acao == 'atualizar'){
			//chama uma tarefa
			$tarefa = new Tarefa();

			//atribui o valor do id a variavel id da classe tarefa e faz o mesmo com a tarefa
			$tarefa->__set('id', $_POST['id']);
			$tarefa->__set('tarefa', $_POST['tarefa']);

			//estabelece uma conexao e chama o tarefa service passando seus parametros
			$conexao = new Conexao();

			$tarefaService = new TarefaService($conexao, $tarefa);

			//chama a função que atualiza o chamado do tarefa service e a coloca dentro de uma condição IF pois ela retorna 1 para true (sucesso na operação) - e nesse caso, caso for 1 a operacao, ele redirecionará o usuario opara a aba todas as tarefas.
			if($tarefaService->atualizar()){


				//todas as funções referentes as alterações atraves de icones recebem essa formatação para receber o redirecionamento correto caso ele esteja na pagina principal (index - condição verificada pelo parametro PAG=index), caso contrario ele redirecionará o usuario para a pagina todas as tarefas.php
				if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
					header('Location: index.php');
				}else{
					header('Location: todas_tarefas.php');
				}
			}
		}
		else if($acao == 'remover'){

			$tarefa = new Tarefa();
			$tarefa->__set('id', $_GET['id']);

			$conexao = new Conexao();
			$tarefaService = new TarefaService($conexao, $tarefa);

			$tarefaService->remover();

			if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
					header('Location: index.php');
				}else{
					header('Location: todas_tarefas.php');
				}

		}
		else if($acao == 'realizar'){
			$tarefa = new Tarefa();
			$tarefa->__set('id', $_GET['id']);
			$tarefa->__set('id_status', 2);

			$conexao = new Conexao();
			$tarefaService = new TarefaService($conexao, $tarefa);

			$tarefaService->realizarTarefa();

			if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
					header('Location: index.php');
				}else{
					header('Location: todas_tarefas.php');
				}
		}
		else if($acao == 'home'){

			$tarefa = new Tarefa();

			$conexao = new Conexao();

			$tarefaService = new TarefaService($conexao, $tarefa);
			$tarefa = $tarefaService->recuperar();


		}
		

		
?>