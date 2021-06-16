let btnPedir = document.getElementById('myBtn')
btnPedir.setAttribute("disabled", "disabled")

setInterval(function(){
    const audio3 = document.getElementById('audio3')
    audio3.play()
}, 500)

function clickButton(){
		    	const audio = document.getElementById('audio')
      			audio.play()
		    }

		    function clickButtonCancel(){
		    	const audio2 = document.getElementById('audio2')
      			audio2.play()
		    }
		    let cont = 0;
		    let span3 = 0;
		    total = 0;
		    totalT = 0;
		    totalTot = 0;
		    t = 0;
		    tot = 0;
		    let g = 0;
			let arr = [["Cacetinho","Integral com manteiga","Bisnaga com manteiga","Croissant com Nutella","Pao de queijo","Baguete com requeijão","Café Expresso","Capuccino","Suco de Laranja","Suco de Abacaxi","Pepsi Lata","Monster Energy","Joelho","Empada de camarão","Coxinha","Croquete","Pastel","Bolinha de queijo","X-Tudo","Mini Pizza","Churros de chocolate","Macaron","Cookie de Nutella","Alfajor"],[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]]

			let precos = [[1.00, 4.00, 3.00, 12.80, 2.00, 5.85, 4.50, 5.70, 3.75, 4.25, 5.00, 12.00, 6.00, 7.00,5.00, 4.00, 7.20,3.00, 18.70, 10.00, 6.75, 4.25, 5.50, 4.75], [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]]
		    let b = 0;
		    function inserirTabela(indice_produto, preco_unitario, quantSoma){
		    	for(let i = 0; i < 1; i++){
			    		if(arr[1][indice_produto] >= 1){
			    			let btn2 = `&nbsp;&nbsp;&nbsp; <i id="button2" class="fas fa-minus"></i>`;
			    			span3.setAttribute('id', 'val'+indice_produto);
			    			b = document.getElementById('val'+indice_produto);
			    			b.innerHTML = (++arr[1][indice_produto]);
			    			console.log(span3.getAttribute('id'));
			    			cont++;
			    			for(let n = 0; n != 24; n++){
								totalT = totalT + (arr[1][n] * precos[0][n])
								t = totalT
							}
							console.log(t)

							let e = document.getElementById("valorTotal");
							e.innerHTML = "R$ " + totalT
							totalT = 0



			    			continue;
			    		}
					    tr = document.createElement('tr');

					    tr.setAttribute('id', "tr"+indice_produto)
					    // 1
					    let td = document.createElement('td');
					    td.setAttribute("class", "align-middle")
					    let span = document.createElement('span');
					    span.innerHTML = arr[0][indice_produto];
					    td.appendChild(span);
					    tr.appendChild(td);

					    // 2
					    td = document.createElement('td');
					    td.setAttribute("class", "align-middle")
					    span = document.createElement('span');
					    span.innerHTML = preco_unitario;
					    td.appendChild(span);
					    tr.appendChild(td);

					    // 3
					    td = document.createElement('td');
					    span3 = document.createElement('span');
					    span3.setAttribute("class", "btn_cancela");
					    span3.setAttribute('id', 'val');	
					    arr[1][indice_produto] += quantSoma			    
					    span3.innerHTML = arr[1][indice_produto];
					    td.appendChild(span3);
					    tr.appendChild(td);
					    tbody.appendChild(tr);
					    cont++;
					    for(let n = 0; n != 24; n++){
							totalTot = totalTot + (arr[1][n] * precos[0][n])
							tot = totalTot
						}

						//Total
						if(g == 0){
								//Total
								tfoot = document.getElementById("tfoot");
								span4 = document.createElement('span');
								span4.setAttribute('id', 'span4');
								span4.setAttribute('class', 'd-flex justify-content-center');
								span4.innerHTML = "Total";

								tr = document.createElement('tr');
								td5 = document.createElement('td');
								td5.setAttribute('colspan', '2');
								td5.appendChild(span4);
								tr.appendChild(td5);

								// 2
								
								td6 = document.createElement('td');
								td6.setAttribute("class", "align-middle");
								span10 = document.createElement('span');
								span10.setAttribute("id", 'valorTotal')
								span10.setAttribute("class", 'd-flex justify-content-center')
								span10.innerHTML = "R$ " + 0
								td6.appendChild(span10);
								tr.appendChild(td6);
									    	    
								tfoot.appendChild(tr);
								/*Total-Final*/
							}
							g++;
					    let e = document.getElementById("valorTotal");
						e.innerHTML = "R$ " + totalTot
						totalTot = 0
					    if(cont > 0){
							let b = document.getElementById('myBtn')
							b.removeAttribute("disabled")
						}	
				}
			}



			function retirarTabela(indice, indice_produto){
				if(cont > 0 && arr[1][indice_produto] > 0){
					span3.setAttribute('id', 'val'+indice_produto);
				    b = document.getElementById('val'+indice_produto);
					b.innerHTML = (--arr[1][indice_produto]+1);
					cont--;
					console.log(cont)
					if(arr[1][indice_produto] === 0){
						document.getElementById(indice).remove();
					}
				}
				
				if(cont <= 0){
					let b = document.getElementById('myBtn')
					b.setAttribute("disabled", "disabled")
					let e = document.getElementById("valorTotal");
					e.innerHTML = 0
				}
				if(arr[1][indice_produto] >= 0){
			    	for(let n = 0; n != 24; n++){
						totalT = totalT + (arr[1][n] * precos[0][n])
						t = totalT
					}
					if(cont > 0){
						let e = document.getElementById("valorTotal");
						e.innerHTML = "R$ " + totalT
						totalT = 0
					}
				}
				
			}

		    // Get the modal
			var modal = document.getElementById("myModal");

			// Get the button that opens the modal
			var btn = document.getElementById("myBtn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on the button, open the modal
			btn.onclick = function() {
			  modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			  modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			  if (event.target == modal) {
			    modal.style.display = "none";
			  }
			}

			var modal1 = document.getElementById("myModal1");

			// Get the button that opens the modal
			var btn1 = document.getElementById("myBtn2");

			// Get the <span> element that closes the modal
			var span2 = document.getElementsByClassName("close")[1];

			// When the user clicks on the button, open the modal
			btn1.onclick = function() {
				while(true){
					let campo1 = document.getElementById("campo1")
					let campo2 = document.getElementById("campo2")
					let campo3 = document.getElementById("campo3")
					let campo4 = document.getElementById("campo4")
					let campo5 = document.getElementById("campo5")
					let campo6 = document.getElementById("campo6")
					if(campo1.value == 0 || campo2.value == 0 || campo3.value == 0 || campo4.value == 0 || campo5.value == 0 || campo6.value == 0){
						alert("É necessário preencher todos os campos!!!")
						break;
					}
				  	modal.style.display = "none";
				  	modal1.style.display = "block";
				  	const audio1 = document.getElementById('audio1')
		  		  	audio1.play()
		  		  	let b = document.getElementById("tbody");
		  		  	b.remove();
		  		  	let tfoot = document.getElementById("tfoot");
		  		  	tfoot.remove();

		  		  	setTimeout(function(){
		  		  		window.location.reload();
		  		  	},1500)
		  		  	
                    btnPedir.setAttribute("disabled", "disabled")
	  		  	}
			}

			// When the user clicks on <span> (x), close the modal
			span2.onclick = function() {
			  modal1.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			  if (event.target == modal1) {
			    modal1.style.display = "none";
			  }
			}