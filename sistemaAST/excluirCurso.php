<?php

if (isset($_GET['id'])) {

    //Conecta no BD
    require("conexao.php");

   //Pega o id da url (Método get)
   $id = $_GET['id'];

   //Prepara a sql
  $sql = "delete from curso where id = {$id}";


  //Executa SQL
mysqli_query($conexao, $sql) or die("Erro ao excluir");

$msg = "Registro excluído com sucesso.";
header("location: listagemCurso.php?msg=($msg)");

} 





?>
