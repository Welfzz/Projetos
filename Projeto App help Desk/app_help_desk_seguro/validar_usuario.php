    <?php
     
    	session_start();
     
    	//variável que verifica se a autenticação foi realizada 
    	$usuario_autenticado = false;
    	$usuario_id = null;
    	$perfil_user_id = null;

    	$perfis = array('Administrativo' => 1, 'Usuario' => 2);
     
    	//usuários do sistema
    	$usuario_app = array(
    		array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '12345', 'perfil_id' => 1),
    		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '12345', 'perfil_id' => 1),
    		array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '12345', 'perfil_id' => 2),
    		array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '12345', 'perfil_id' => 2),
     
    	);
     
    	foreach ($usuario_app as $user) {
    		
    		if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
    			$usuario_validado = true;
    			$usuario_id = $user['id'];
    			$perfil_user_id = $user['perfil_id'];
    		}
    		
    	}
     
    	if ($usuario_validado) {
    		echo 'Usuário autenticado';
    		$_SESSION['autenticar'] = 'SIM';
    		$_SESSION['id'] = $usuario_id;
    		$_SESSION['perfil_id'] = $perfil_user_id;
    		header('Location: home.php');
    	} else {
    		$_SESSION['autenticar'] = 'NÃO';
    		header('Location: index.php?login=erro');
    	}
     
     
    	
     
    ?>