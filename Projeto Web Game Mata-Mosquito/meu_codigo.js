    var Altura = 0
    var Largura = 0
    var vidas = 1
    var tempo = 11
    var tempoDificuldade = 2000

    var dificuldade = window.location.search
    dificuldade = dificuldade.replace('?', '')

    if(dificuldade == 'facil'){
    	tempoDificuldade = 2000
    }
    else if(dificuldade == 'normal'){
    	tempoDificuldade = 1200
    }
    else if(dificuldade == 'dificil'){
    	tempoDificuldade = 750
    }
     
    function ajustaTamanhoPalcoJogo() {
    Altura = window.innerHeight  
    Largura = window.innerWidth 

    }
     
    ajustaTamanhoPalcoJogo()

    var cronometro = setInterval(function(){
    	tempo -= 1

    	if(tempo <= 0){
    			clearInterval(cronometro)
    			clearInterval(criaMosca)
    			window.location.href = 'vitoria.html'
    		}

    	document.getElementById('crono').innerHTML = tempo
    }, 1000)


     
    function posicaoRandomica(){

    	if(document.getElementById('mosquito')){
    		document.getElementById('mosquito').remove()

    		document.getElementById('life' + vidas).src = 'IMG/coracao_vazio.png'
    		vidas++

    		if(vidas > 3){
    			window.location.href = "game_over.html"
    		}
    		

    	}

	    var posicaoX = Math.floor(Math.random() * (Largura - 90))
	    var posicaoY = Math.floor(Math.random() * (Altura - 90))

	    if(posicaoX < 0 || posicaoY < 0){
	    	posicaoX = 0
	    	posicaoY = 0
	    }


	    var mosquito = document.createElement('img')

	    mosquito.src = 'IMG/mosca.png'
	    mosquito.className = tamanhoAleatorio() + ' ' + ladoAleatorio()
	    mosquito.style.left = posicaoX + 'px'
	    mosquito.style.top = posicaoY + 'px'
	    mosquito.style.position = 'absolute'
	    mosquito.id = 'mosquito'
	    mosquito.onclick = function(){
	    	document.getElementById('mosquito').remove()
	    }

	    document.body.appendChild(mosquito)

	    

	   }

	   function tamanhoAleatorio(){

	   	var classe = Math.floor(Math.random() * 3)

	   	if(classe == 0){
	   		return 'mosquito1'
	   	}
	   	else if(classe == 1){
	   		return 'mosquito2'
	   	}
	   	else{
	   		return 'mosquito3'
	   	}
	   }

	   function ladoAleatorio(){
	   	var lado = Math.floor(Math.random() * 2)

	   	if(lado == 0){
	   		return 'ladoA'
	   	}
	   	else if(lado == 1){
	   		return 'ladoB'
	   	}
	   }

	   