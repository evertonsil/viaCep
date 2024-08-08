<?php

//autoload para chamar a classe
spl_autoload_register(function ($class) {
    require_once('classes/' . $class . '.php');
});
//inicializando objeto 
$c = new ViaCep();

//regex para validar o cep, retirando oa hífen
$cep_regex = '/^[0-9]{5}-[0-9]{3}$/';
//chamando o campo cep, enviado pelo ajax
$cep = filter_input(INPUT_POST, 'cep', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $cep_regex)));

$address = $c->getAddress($cep);

echo $address;