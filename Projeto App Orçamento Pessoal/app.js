class Despesa {
	constructor(ano, mes, dia, tipo, desc, valor){
		this.ano = ano
		this.mes = mes
		this.dia = dia
		this.tipo = tipo
		this.descricao = desc
		this.valor = valor
	}

	validarDados(){
		for(let i in this){
			if(this[i] == undefined || this[i] == null || this[i] == ''){
				return false
			}
		}
		return true
	}
}

class Bd {
	constructor(){

		let id = localStorage.getItem('id')

		if(id === null){
			localStorage.setItem('id', 0)
		}
	}

	getProximoId(){
		let proximoId = localStorage.getItem('id')
		return parseInt(proximoId) + 1
		
	}

	gravarDado(despesa){
		
		let id = this.getProximoId()
		localStorage.setItem(id, JSON.stringify(despesa))
		localStorage.setItem('id', id)
	}

	recuperaTodosRegistros(){
		let listaDespesa = Array()

		let id = localStorage.getItem('id')

		for(let i = 1; i<=id; i++){
			let despesa = JSON.parse(localStorage.getItem(i))

			if(despesa === null){
			continue
			}

			despesa.id = i
			listaDespesa.push(despesa)

		}
		return listaDespesa

	}
	pesquisar(despesa){

		let despesasFiltradas = Array()

		despesasFiltradas = this.recuperaTodosRegistros()

		console.log(despesa)
		console.log(despesasFiltradas)

		if(despesa.ano != ''){
			despesasFiltradas = despesasFiltradas.filter(function(f) {return f.ano == despesa.ano})
		}
		if(despesa.mes != ''){
			despesasFiltradas = despesasFiltradas.filter(function(f) {return f.mes == despesa.mes})
		}
		if(despesa.dia != ''){
			despesasFiltradas = despesasFiltradas.filter(function(f) {return f.dia == despesa.dia})
		}
		if(despesa.tipo != ''){
			despesasFiltradas = despesasFiltradas.filter(function(f) {return f.tipo == despesa.tipo})
		}
		if(despesa.descricao != ''){
			despesasFiltradas = despesasFiltradas.filter(function(f) {return f.descricao == despesa.descricao})
		}
		if(despesa.valor != ''){
			despesasFiltradas = despesasFiltradas.filter(function(f) {return f.valor == despesa.valor})
		}

		return despesasFiltradas

	}
	remover(id){
		localStorage.removeItem(id)
	}

}

let bd = new Bd()

function cadastrarDespesa(){

	let Ano = document.getElementById('ano').value
	let Mes = document.getElementById('mes').value
	let Dia = document.getElementById('dia').value
	let Tipo = document.getElementById('tipo').value
	let Descricao = document.getElementById('descricao').value
	let Valor = document.getElementById('valor').value

	let despesa1 = new Despesa(Ano,Mes,Dia,Tipo,Descricao,Valor)

	if(despesa1.validarDados() === true){
		bd.gravarDado(despesa1)
		document.getElementById('tituloModal').className = 'text-success'
		document.getElementById('tituloModal').innerHTML = 'Despesa Cadastrada!'
		document.getElementById('descricaoModal').innerHTML = 'Despesa cadastrada com sucesso! Clique em "Voltar" para continuar.'
		document.getElementById('botaoModal').className = 'btn btn-success'
		document.getElementById('botaoModal').innerHTML = 'Voltar'
		$('#verificarGravacao').modal('show')

		ano.value = ''
		mes.value  = ''
		dia.value  = ''
		tipo.value  = ''
		descricao.value  = ''
		valor.value  = ''
	}
	else{
		document.getElementById('tituloModal').className = 'text-danger'
		document.getElementById('tituloModal').innerHTML = 'Erro no registro da despesa!'
		document.getElementById('descricaoModal').innerHTML = 'Existem campos obrigatorios que não foram preenchidos!!'
		document.getElementById('botaoModal').className = 'btn btn-danger'
		document.getElementById('botaoModal').innerHTML = 'Tentar novamente'
		$('#verificarGravacao').modal('show')
	}
	
}

function carregaListaDespesa(){

	let listaDespesa = Array()

	despesa = bd.recuperaTodosRegistros()

	let tabelaDespesa = document.getElementById('tabelaDespesa')

	despesa.forEach(function (d){

		let linha = tabelaDespesa.insertRow()

		linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`
		linha.insertCell(1).innerHTML = d.tipo
		linha.insertCell(2).innerHTML = d.descricao
		linha.insertCell(3).innerHTML = d.valor

		let btn = document.createElement('button')
		btn.className = 'btn btn-danger'
		btn.innerHTML = '<i class="fa fa-times"  ></i>'
		btn.id = `id_despesa_${d.id}`
		btn.onclick = function(){
			let id = this.id.replace('id_despesa_','')
			//alert(id)
			bd.remover(id)
			window.location.reload()
		}
		linha.insertCell(4).append(btn)
	})


}

function pesquisarDespesa(){

	let ano = document.getElementById('ano').value
	let mes = document.getElementById('mes').value
	let dia = document.getElementById('dia').value
	let tipo = document.getElementById('tipo').value
	let descricao = document.getElementById('descricao').value
	let valor = document.getElementById('valor').value

	let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor)

	let despesas = bd.pesquisar(despesa)


	//codigo para re-screver as despesas de acordo com as pesquisas
	let tabelaDespesa = document.getElementById('tabelaDespesa')
	tabelaDespesa.innerHTML = ''

	despesas.forEach(function (d){

		let linha = tabelaDespesa.insertRow()

		linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`
		linha.insertCell(1).innerHTML = d.tipo
		linha.insertCell(2).innerHTML = d.descricao
		linha.insertCell(3).innerHTML = d.valor


	})
}

