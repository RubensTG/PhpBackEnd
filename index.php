<?php

header("Access-Control-Allow-Origin: *");/*Habilita o cors*/
//define('PASTAPROJETO', 'AulaBanco');
define('PASTAPROJETO', 'AulaBanco');

/* Função criada para retornar o tipo de requisição */
function checkRequest() {
	$method = $_SERVER['REQUEST_METHOD'];/*Padrao do PHP*/
	switch ($method) {
	  case 'PUT':
	  	/*Resposta*/$answer = "update";
	    break;
	  case 'POST':	  
	  	$answer = "post";
	    break;
	  case 'GET':
	  	$answer = "get";
	    break;
	  case 'DELETE':
	  	$answer = "delete";
	    break;	
	  default:
	    handle_error($method);  
	    break;
	}
	return $answer;
}

$answer = checkRequest();

$request = $_SERVER['REQUEST_URI']; /*Qual o endereço que a pessoa digitou pra chegar nessa página*/

// IDENTIFICA A URI DA REQUISIÇÃO

switch ($request) {
    case '/'.PASTAPROJETO:
      require __DIR__ . '/api/api.php';
        break;
    case '/'.PASTAPROJETO.'/' :
        require __DIR__ . '/api/api.php';/*Com a barra no final, segundo modo*/
        break;
    case '' :
        require __DIR__ . '/api/api.php';
        break;
    case '/'.PASTAPROJETO.'/pessoas' :
        require __DIR__ . '/api/'.$answer.'_pessoa.php'; /*pega um dos metodos e concatena*/
        break;
    case '/'.PASTAPROJETO.'/conteudo' :
        require __DIR__ . '/api/'.$answer.'_conteudo.php';
        break;
    
    default:
        //require __DIR__ . '/api/404.php';
        break;
}
