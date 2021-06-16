<? require_once("validador_acesso.php"); ?>

<?php
  
  

  $arquivo = fopen('../../app_help_desk_seguro/arquivo.txt', 'r');

  $chamados = array();

  while(!feof($arquivo)){

    $registro = fgets($arquivo);
    $chamados[] = $registro;

  }

  fclose($arquivo);


?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <? foreach($chamados as $dados){ ?>

                <?php
                  $membros = explode('#', $dados);

                  if($_SESSION['perfil_id'] == 2){

                    if($_SESSION['id'] != $membros[0]){
                      continue;
                    }

                  }

                  if(count($membros) < 3){
                    continue;
                  }

                ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">

                  <h5 class="card-title"><?= $membros[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $membros[2] ?></h6>
                  <p class="card-text"><?= $membros[3] ?></p>

                </div>
              </div>

              <? } ?>

              

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php"class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>