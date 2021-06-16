
<?php

	//print_r($_POST);
	
	//inserindo phpmailer no projeto
	require './bibliotecas/PHPMailler/Exception.php';
	require './bibliotecas/PHPMailler/OAuth.php';
	require './bibliotecas/PHPMailler/PHPMailer.php';
	require './bibliotecas/PHPMailler/POP3.php';
	require './bibliotecas/PHPMailler/SMTP.php';

	//importando classes
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	class Mensagem {
		private $para = null;
		private $assunto = null;
		private $mensagem = null;
		public $status = array('situacao_status' => null, 'mensagem_status' => '');

		
		public function __get($atributo){
			return $this->$atributo;
		}

		
		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

		public function mensagemValida(){

		 if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
		 	return false;
		 }

		 return true;
		 
	}
}

	$mensagem = new Mensagem();

	$mensagem->__set('para', $_POST['para']);
	$mensagem->__set('assunto', $_POST['assunto']);
	$mensagem->__set('mensagem', $_POST['mensagem']);

	//print_r($mensagem);

	if(!$mensagem->mensagemValida()){
		echo 'A mensagem não é válida';
		header('Location: index.php?AcessoNegado');
	}
	

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = false;                      // Enable verbose debug output
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'balajunior37@gmail.com';                // SMTP username
	    $mail->Password   = '35722185l';                             // SMTP password
	    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	    $mail->Port       =  587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	    //Recipients
	    $mail->setFrom('balajunior37@gmail.com', 'Liniker');
	    $mail->addAddress($mensagem->__get('para')); 


	    // Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	   //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $mensagem->__get('assunto');
	    $mail->Body    = '<strong>' . $mensagem->__get('mensagem') . '</strong>';
	    //$mail->AltBody = $mensagem->__get('mensagem');

	    $mail->send();

	    $mensagem->status['situacao_status'] = 1;
	    $mensagem->status['mensagem_status'] = 'Mensagem enviada com sucesso!!!';

	} catch (Exception $e) {

		$mensagem->status['situacao_status'] = 2;
	    $mensagem->status['mensagem_status'] = 'Mensagem não pode ser enviada corretamente.';

	    //echo "Mensagem não pode ser enviada corretamente. Detalhes do erro: {$mail->ErrorInfo}";
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Envio</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

	<div class="container">
		<div class="py-3 text-center">
			<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
			<h2>Send Mail</h2>
			<p class="lead">Seu app de envio de e-mails particular!</p>
		</div>

		<div class="row">
			<div class="col-md-12">
				<? if($mensagem->status['situacao_status'] == 1){ ?>
      		
					<div class="container">
						<h1 class="display-4 text-succes">Sucesso</h1>
						<p><?= $mensagem->status['mensagem_status'] ?></p>
						<a class="btn btn-success btn-lg mt-5 text-white" href="index.php">Voltar</a>
					</div>

      			<? } ?>

      			<? if($mensagem->status['situacao_status'] == 2){ ?>
      		
      				<div class="container">
						<h1 class="display-4 text-danger">Ops...</h1>
						<p><?= $mensagem->status['mensagem_status'] ?></p>
						<a class="btn btn-danger btn-lg mt-5 text-white" href="index.php">Voltar</a>
					</div>


      			<? } ?>
			</div>
		</div>
	</div>



	

</body>
</html>