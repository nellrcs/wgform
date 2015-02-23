<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>FORMULARIO</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/jquery.mask.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">	
<h1>CLASSE WGFORM</h1>

<?php 
	/* INCLUI A CLASSE PHP */
	include "wgform.class.php";
	
	/* CONFIGURAÇÕES FORMULARIO */
	/* 
	Se existir nome os dados serão retornado dentro da tag <form>, 
	se não existir algumas opções nao serão mais validas 
	*/
	WGform::$nome = 'formulario1';

	/* Caminho do action */
	WGform::$action = 'print_request.php';
	
	/* Nome da classe css*/
	WGform::$css_class = 'formulario_contato';
	
	/* Personalisa o botao enviar dentro do form */
	WGform::$html_botao = null;

	/* Metodo POST ou GET*/
	WGform::$method = "POST";

	/* Inclui automatico um ajax que faz o submit, Passar array com os nomes das funcoes js na ordem. success|error|beforeSend|complete */
	WGform::$ajax = array('enviado','erro','antes_enviar','completo');

	/* ARRAY COM OS CAMPOS DA TABELA , OPÇÕES ETC. */
	$paramtros_obj = array();

	/* CADA CAMPO DO ARRAY RECEBE UM INDEX COM AS PROPIEDADES. */
	$todas = array(
			'tipo'=>0, /*0: input, 1:textarea, 2:select , 3:radio, 4:checkbox, 5:oculto, 6:arquivo, default:input */
			
			'label'=>true, /* Exibe tag label antes do nome. */
			
			'titulo'=>'Todos', /* Define o titulo do campo. */
			
			'campo'=>'todos',  /* Nome do campo igual o que sera usado na tabela ou campo que tera as opções. */
			
			'valor'=>'12345', /* Se houver um value */
			
			'id'=>'nome', /* Id geralmente eh atribuido altomatico, mas se precisdar usar um id expecifico */
			
			'obrigatorio'=>true, /* O preenchimanto sera obrigatorio */
			
			'placeholder'=>true, /* O placeholder usara o valor do titulo */
			
			'mascara'=>'(00) 000-0000', /* Usar jquery.mask.min.js  */
			
			'html_antes'=>'<hr></hr>', /* Insere string html antes do input */
			
			'html_depois'=>'</br>', /* Insere string html depois do input */
			
			'css_class'=>'form-control', /* classe css no input, classe default form-control (Bootstrap) */
			
			'opcoes'=>array('1'=>'campo1','@2'=>'campo2','3'=>'campo3') /* Opções do select, @ marca o campo selecionado */
			);

	$paramtros_obj['todas'] = WGform::index($todas);


	/* OU */

	$campos = array('nome','sobrenome','idade','estado','cidade','bairro','rua','numero','cep');
	foreach ($campos as $campo) {
		$paramtros_obj[$campo] = WGform::index(array('tipo'=>0,'campo'=>$campo,'titulo'=>$campo,'label'=>true));
	}
		

	/* OU */

	$paramtros_obj['telefone'] = WGform::index(array('tipo'=>0,'label'=>true,'titulo'=>'Telefone','mascara'=>'(00) 000-0000'));
	$paramtros_obj['sexo'] = WGform::index(array('tipo'=>2,'label'=>true,'titulo'=>'Sexo','opcoes'=>array('masculino','feminino')));
	$paramtros_obj['arquivo'] = WGform::index(array('tipo'=>6,'label'=>true,'titulo'=>'Arquivo'));
	$paramtros_obj['mensagem'] = WGform::index(array('tipo'=>1,'titulo'=>'Mensagem','label'=>1,'html_depois'=>'<br>'));

	/* EXIBE O FORMULARIO OU CAMPOS. */
	print WGform::formulario($paramtros_obj);


?>
</div>	


</div>
</body>
</html>

