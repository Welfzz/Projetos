$(document).ready(() => {

	
		$('#documentacao').on('click', () => {

			$('#pagina').load('documentacao.html')

		})


		$('#suporte').on('click', () =>{

			$('#pagina').load('suporte.html')

		})

		$('#competencia_datas').on('change', e =>{

			//recupera o valor da competencia selecionada no select
			let competencia = $(e.target).val()
			console.log(competencia)

			$.ajax({
				type:'GET',
				url:'app.php',
				data:`competencia=${competencia}`,
				dataType:'json',
				success: dados =>{
					$('#numVendas').html(dados.numeroVendas)
					$('#totVendas').html(dados.totalVendas)
					$('#cliAtivos').html(dados.clientesAtivos)
					$('#cliInativos').html(dados.clientesInativos)
					$('#recClient').html(dados.reclamacoesClientes)
					$('#eloClient').html(dados.elogiosClientes)
					$('#sugClient').html(dados.sugestoesClientes)
					$('#totDespes').html(dados.totalDespesas)
				},
				error: erro =>{
					console.log(erro)
				}
			})


		})


})