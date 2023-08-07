<?php
	include('../config.php');
	$data = array();
	$assunto = 'Novo mensagem do site!';
	$corpo = '';

	foreach ($_POST as $key => $value) {
		$corpo.=ucfirst($key).": ".$value;
		$corpo.="<hr>";
	}

	$info = array('assunto'=>$assunto,'corpo'=>$corpo);
	$mail = new Email('valente-victor@hotmail.com','valente-victor@hotmail.com','senha123','Victor');
	$mail->addAdress('valente-victor@hotmail.com','Victor');
	$mail->formatarEmail($info);

	if($mail->enviarEmail()){
		$data['sucesso'] = true;
	}else{
		$data['erro'] = true;
	}

	//$data['retorno'] = 'sucesso';

	die(json_encode($data));	// finalizar o script retornando em json
?>