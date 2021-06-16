<?php

  session_start();
  if(!isset($_SESSION['autenticar']) || $_SESSION['autenticar'] != 'SIM'){
    header('Location: index.php?login=erro2');
  }

?>