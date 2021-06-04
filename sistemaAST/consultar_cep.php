<?php
$cep = $_POST['cep'];
$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep); 
$dados['sucesso'] = (string) $reg->resultado;
$dados['cidade']  = (string) $reg->cidade;
echo json_encode($dados);
?>