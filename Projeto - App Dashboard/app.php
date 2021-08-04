<?php

	//criando o dashboard que atribui os valores aos atributos e retornam
	class Dashboard {

		//informando as datas iniciais efinas e o que deve ser retornado dentro dessas datas
		public $data_inicio;
		public $data_fim;
		public $numeroVendas;
		public $totalVendas;
		public $clientesAtivos;
		public $clientesInativos;
		public $reclamacoesClientes;
		public $elogiosClientes;
		public $sugestoesClientes;
		public $totalDespesas;


		//retorna os valores setados para o codigo
		public function __get($atributo){
			return $this->$atributo;
		}

		//seta os valores recebidos aos atributos antes de retorna-los para o codigo
		public function __set($atributo, $valor){
			$this->$atributo = $valor;
			return $this;
		}


	}

	//estabelece uma conexao com o banco de dados de forma privada
	class Conexao{

		private $host = 'localhost';
		private $dbname = 'dashboard';
		private $user = 'root';
		private $pass = '';


		public function conectar(){
			try{
				$conexao = new PDO(

					"mysql:host=$this->host;dbname=$this->dbname",
					"$this->user",
					"$this->pass"

				);

				//como todo o sistema gira em torno da regra UTF-8, será necessario fazer com que a conexão com o banco de dados tambem siga essa regra, para isso:
				$conexao->exec('set charset utf8');

				return $conexao;
					
					

			}catch(PDOException $e){

				echo '<p>' . $e->getMessage() . '</p>';

			}
		}




	}



	//classe que permite manipular o objeto no banco de dados
	class Bd{
		//recebe a conexao e dashboard
		private $conexao;
		private $dashboard;

		//recebe o conexao e o dashboard como objetos declarados, ou seja, podemos acessar seus metodos
		public function __construct(Conexao $conexao, Dashboard $dashboard){
			//atribiu o metodo conectar da classe conexao ao atributo
			$this->conexao = $conexao->conectar();
			$this->dashboard = $dashboard;
		}

		public function getNumeroVendas(){
			$query = 'select 
				count(*) as numero_vendas 
			from 
				tb_vendas 
			where 
				data_venda between :data_inicio and :data_fim';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
		}

		public function getTotalVendas(){
			$query = '
				select SUM(total) as total_vendas from tb_vendas where data_venda between :data_inicio and :data_fim
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;

		}
		public function getClientesAtivos(){
			$query = '
				select count(*) as clientes_ativos, data_venda from tb_clientes, tb_vendas where data_venda between :data_inicio and :data_fim and cliente_ativo = 1 
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->clientes_ativos;


		}

		public function getClientesInativos(){
			$query= '
				select count(*) as clientes_inativos, data_venda from tb_clientes, tb_vendas where data_venda between :data_inicio and :data_fim and cliente_ativo = 0 
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->clientes_inativos;
		}

		public function getReclamacoes(){
			$query = '
				select count(*) as reclamacoes_clientes, data_venda from tb_contatos, tb_vendas where data_venda between :data_inicio and :data_fim and tipo_contato = 1 
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->reclamacoes_clientes;
		}

		public function getElogios(){
			$query = '
				select count(*) as elogios_clientes, data_venda from tb_contatos, tb_vendas where data_venda between :data_inicio and :data_fim and tipo_contato = 3 
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->elogios_clientes;
		}

		public function getSugestoes(){
			$query = '
				select count(*) as sugestoes_clientes, data_venda from tb_contatos, tb_vendas where data_venda between :data_inicio and :data_fim and tipo_contato = 2 
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->sugestoes_clientes;
		}


		public function getTotalDespesas(){
			$query = '
				select SUM(total) as total_despesas from tb_despesas where data_despesa between :data_inicio and :data_fim
			';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue('data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue('data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_despesas;
		}






		 

	}


//juntando tudo
$dashboard = new Dashboard();
$conexao = new Conexao();

//recebendo dados e retornando resposta para requisição asssincrona Ajax em objeto literal JSON

$competencia = explode('-', $_GET['competencia']);
$ano = $competencia[0];
$mes = $competencia[1];

$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

//atribuindo valores para as datas do dashboard atraves de seu set com implode das informações de competencia anteriores.
//não pode existir / na formação da data, para separar utilizamos -.
$dashboard->__set('data_inicio', $ano . '-' . $mes . '-01');
$dashboard->__set('data_fim', $ano . '-' . $mes . '-' . $dias_do_mes);

//passando para o BD as duas instancias acima
$bd = new Bd($conexao, $dashboard);


//---------------------------

//atribuindo o numero de vendas ao atributo do dashboard
$dashboard->__set('numeroVendas', $bd->getNumeroVendas());
$dashboard->__set('totalVendas', $bd->getTotalVendas());
$dashboard->__set('clientesAtivos', $bd->getClientesAtivos());
$dashboard->__set('clientesInativos', $bd->getClientesInativos());
$dashboard->__set('reclamacoesClientes', $bd->getReclamacoes());
$dashboard->__set('elogiosClientes', $bd->getElogios());
$dashboard->__set('sugestoesClientes', $bd->getSugestoes());
$dashboard->__set('totalDespesas', $bd->getTotalDespesas());

echo json_encode($dashboard);

 















?>