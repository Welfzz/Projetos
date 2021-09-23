$(document).ready(function() {
	
	let produtos = ["IMG/produto.png", "IMG/produto1.png", "IMG/produto2.png", "IMG/produto3.png"]

	let divConteudo = document.getElementById('div_mae')

	for(let i=0; i < produtos.length; i++){
		let divObj = document.createElement('div')
		let imgObj = document.createElement('img')
		divObj.className = "col-md-3 "
		divObj.id = "div_mae_" + i
		imgObj.src = produtos[i]
		imgObj.id = 'imgJS'

		divConteudo.appendChild(divObj)
		divObj.appendChild(imgObj)

		//adiciona os valores de cada produto
		let div_mae_2 = document.createElement('div')
		
		if(produtos[i] == "IMG/produto.png"){
				div_mae_2.innerHTML = "Gôndola XYZ <br><br> <strong class='text-dark'>R$199,00</strong> <br> <small style='color: gray;'>ou em 6x de R$49,90</small>"
				div_mae_2.className = "estiloProd p-3"
		}
		if(produtos[i] == "IMG/produto1.png"){
				div_mae_2.innerHTML = "Gôndola XYZ <br><br> <strong class='text-dark'>R$119,90</strong> <br> <small style='color: gray;'>ou em 6x de R$29,90</small>"
				div_mae_2.className = "estiloProd p-3"
		}
		if(produtos[i] == "IMG/produto2.png"){
				div_mae_2.innerHTML = "Gôndola XYZ <br><br> <strong class='text-dark'>R$139,90</strong> <br> <small style='color: gray;'>ou em 6x de R$22,70</small>"
				div_mae_2.className = "estiloProd p-3"
		}
		if(produtos[i] == "IMG/produto3.png"){
				div_mae_2.innerHTML = "Gôndola XYZ <br><br> <strong class='text-dark'>R$139,90</strong> <br> <small style='color: gray;'>ou em 6x de R$23,31</small>"
				div_mae_2.className = "estiloProd p-3"	
			}

		divObj.appendChild(div_mae_2)
	}

	let ativo = 0
			$('#imgChat').on('click', () => {

				switch(ativo){
					case 0:
						$('#barra_copy').append('<div class="bg bg-light chatSpace col-md-3 border border-success" >CHAT</div>')
				
						$('#imgChat').removeClass('btn_chat')
						$('#imgChat').addClass('btn_chat_ativo')
						ativo++
						break

					case 1:
						$('.chatSpace').remove()

						$('#imgChat').removeClass('btn_chat_ativo')
						$('#imgChat').addClass('btn_chat')
						ativo--
						break

				}
			})
})