window.onload = function() {

	//formatações iniciais do projeto quando o usuário abre a página pela primeira vez ou quando recarrega.

	document.getElementById('pesquisa').value = ''

	let produtos = ["IMG/joias.png", "IMG/camisa.png", "IMG/sapato.png", "IMG/camisa1.png", "IMG/joias1.png", "IMG/vestido.png", "IMG/camisa2.png", "IMG/sapato1.png", "IMG/vestido1.png", "IMG/sapato2.png", "IMG/vestido2.png", "IMG/vestido3.png", "IMG/camisa3.png"]

	let QTD = produtos.length
	document.getElementById('QTD').innerHTML = QTD +" produtos encontrados"

	let divConteudo = document.getElementById('area_conteudo')

	for(let i=0; i< produtos.length; i++){

		let divBase = document.createElement('div')
		divBase.className = 'divBase col-md-2'

		let imgBase = document.createElement('img')
		imgBase.src = produtos[i]	
		
		divConteudo.appendChild(divBase)

		divBase.appendChild(imgBase)
		imgBase.className = 'imgBase'
	}
	
	//Area de busca - Ao inserir na barra de busca algum dos produtos contidos na loja (Camisas, Vestidos, Sapatos e Joias), a busca e retorno serão feitas.
	
	let btn = document.getElementById('icon-pesquisa')
	btn.onclick = function(){

		while (divConteudo.firstChild) {
 			 divConteudo.removeChild(divConteudo.firstChild);
		}

		let valorSearch = document.getElementById('pesquisa').value.trim()
			
		if(valorSearch.toUpperCase() == 'CAMISA' || valorSearch.toUpperCase() == 'CAMISAS'){

			let camisas = ["IMG/camisa.png","IMG/camisa1.png","IMG/camisa2.png", "IMG/camisa3.png"]

			let QTD = camisas.length
			document.getElementById('QTD').innerHTML = QTD +" produto(s) encontrado(s)"
			
			for(let i=0; i< camisas.length; i++){
		
				let divBase = document.createElement('div')
				divBase.className = 'divBase col-md-2'

				let imgBase = document.createElement('img')
				imgBase.src = camisas[i]	
		
				divConteudo.appendChild(divBase)

				divBase.appendChild(imgBase)
				imgBase.className = 'imgBase'
			}
		}else if(valorSearch.toUpperCase() == 'VESTIDO' || valorSearch.toUpperCase() == 'VESTIDOS'){

			let vestidos = ["IMG/vestido.png","IMG/vestido1.png","IMG/vestido2.png","IMG/vestido3.png","IMG/vestido4.png"]

			let QTD = vestidos.length
			document.getElementById('QTD').innerHTML = QTD +" produto(s) encontrado(s)"
			
			for(let i=0; i< vestidos.length; i++){
		
				let divBase = document.createElement('div')
				divBase.className = 'divBase col-md-2'

				let imgBase = document.createElement('img')
				imgBase.src = vestidos[i]	
		
				divConteudo.appendChild(divBase)
				divBase.appendChild(imgBase)
				imgBase.className = 'imgBase'
			}
		}else if(valorSearch.toUpperCase() == 'JOIA' || valorSearch.toUpperCase() == 'JOIAS'){

			let joias = ["IMG/joias.png","IMG/joias1.png","IMG/joias2.png"]

			let QTD = joias.length
			document.getElementById('QTD').innerHTML = QTD +" produto(s) encontrado(s)"
			
			for(let i=0; i< joias.length; i++){
		
				let divBase = document.createElement('div')
				divBase.className = 'divBase col-md-2'

				let imgBase = document.createElement('img')
				imgBase.src = joias[i]	
		
				divConteudo.appendChild(divBase)
				divBase.appendChild(imgBase)
				imgBase.className = 'imgBase'
			}
		}else if(valorSearch.toUpperCase() == 'SAPATO' || valorSearch.toUpperCase() == 'SAPATOS'){

			let sapatos = ["IMG/sapato.png","IMG/sapato1.png","IMG/sapato2.png"]

			let QTD = sapatos.length
			document.getElementById('QTD').innerHTML = QTD +" produto(s) encontrado(s)"
			
			for(let i=0; i< sapatos.length; i++){
		
				let divBase = document.createElement('div')
				divBase.className = 'divBase col-md-2'

				let imgBase = document.createElement('img')
				imgBase.src = sapatos[i]	
		
				divConteudo.appendChild(divBase)
				divBase.appendChild(imgBase)
				imgBase.className = 'imgBase'
			}
		}else{
			document.getElementById('QTD').innerHTML = "Nenhum produto encontrado"

			let divNova = document.createElement('div')
			divNova.className = 'col-md-12 p-2 row'
			divConteudo.appendChild(divNova)

			let imgNova = document.createElement('img')
			imgNova.src = 'IMG/Bitmap.png'
			imgNova.className = 'm-auto col-md-5'

			let texto_falha = document.createElement('strong')
			texto_falha.className = 'col-md-12 texto_falha'
			texto_falha.innerHTML = 'ué, não encontramos nadinha'
			divNova.appendChild(texto_falha)

			let texto_falha2 = document.createElement('p')
			texto_falha2.className	= 'col-md-12 text-center pb-3'
			texto_falha2.innerHTML = 'que tal recomeçar do começo?'
			divNova.appendChild(texto_falha2)

			let btnLimpar2 = document.createElement('button')
			btnLimpar2.innerHTML = 'Limpar busca'
			btnLimpar2.className = 'col-md-2 m-auto p-2 mb-4 btn_limpar'

			divNova.appendChild(btnLimpar2)


			let divIMG = document.createElement('div')
			divIMG.className = "col-md-12 p-3 d-flex"

			divNova.appendChild(divIMG)
			divIMG.appendChild(imgNova)


			btnLimpar2.onclick = function(){
				document.getElementById('pesquisa').value = ''
			}

		}	
	}

	//botão que limpa o conteudo digitado na barra de busca.

	let btnLimpar = document.getElementById('limpar_conteudo')
	btnLimpar.onclick = function(){
		document.getElementById('pesquisa').value = ''
	}
}

