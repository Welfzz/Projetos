function calcular(tipo, valor){

	if(tipo === 'acao'){

		if(valor === 'c'){
			document.getElementById('visor').value = ''
		}
		else if(valor === '+' || valor === '-' || valor === '*' || valor === '/'){
			var conteudo = document.getElementById('visor').value
			if(conteudo.includes('+') || conteudo.includes('-') || conteudo.includes('*') || conteudo.includes('/')){
				return document.getElementById('visor').value
			}
			else{
				document.getElementById('visor').value += valor
			}
		}
		else if(valor === 'd'){
			var tamanho = document.getElementById('visor').value.length
			document.getElementById('visor').value = document.getElementById('visor').value.substring(0, (tamanho -1))
		}
		else if(valor === '.'){
			var conteudo = document.getElementById('visor').value += valor

			if(valor === '.' && valor.charAt(0)){
				document.getElementById('visor').value = conteudo
			}
		}
		else if(valor === '='){
			var resultado = eval(document.getElementById('visor').value)
			document.getElementById('visor').value = resultado
		}

	}
	else if(tipo === 'valor'){
		document.getElementById('visor').value += valor
	}
}