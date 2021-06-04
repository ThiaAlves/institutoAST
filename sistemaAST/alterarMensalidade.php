<?php 
require ("conexao.php");
require_once('funcoes.php');

//verifica se foi clicado no botão cadastrar
if (isset($_POST['cadastrar'])) {
    $id = $_POST['id'];
    $valor = $_POST['valor'];
    $mesReferencia = $_POST['mesReferencia'];
    $dataRecebimento = $_POST['dataRecebimento'];
    $desconto = $_POST['desconto'];
    $juros = $_POST['juros'];
    $formaRecebimento = $_POST['formaRecebimento'];
    $status = $_POST['status'];
    if ($status == "1"){
        $status = 1;
    }else{
        $status = 0;
    }

    $sql = "update mensalidade 
               set valor     = '{$valor}',
                   mesReferencia = '{$mesReferencia}',
                   dataRecebimento = '{$dataRecebimento}',
                   desconto = {$desconto},
                   juros = {$juros},
                   formaRecebimento = '{$formaRecebimento}',
                   status = {$status}
             where id       = {$id}"; 
    mysqli_query($conexao, $sql);
    echo "<div class='alert alert-success  alert-dismissible fade show text-center' role='alert' style='font-family: cornerstone; width:450px;
    height:150px; background:rose; position:absolute; z-index:100; top:50%; left:33%; color:white; display: flex; flex-direction: row;
    justify-content: center;  align-items: center'>
    <span class='mdi mdi-check-circle-outline'></span> <h3 style='color:green'>Registro salvo com sucesso!</h3>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}

$sql = "select * from mensalidade where id = " . $_GET['id'];

$resultado = mysqli_query($conexao, $sql) or die("Erro ao pesquisar");

if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado);
    
    $id = $linha['id'];
    $valor = $linha['valor'];
    $mesReferencia = $linha['mesReferencia'];
    $dataRecebimento = $linha['dataRecebimento'];
    $desconto = $linha['desconto'];
    $juros = $linha['juros'];
    $formaRecebimento = $linha['formaRecebimento'];
    $status = $linha['status'];

} else{
    echo "Nenhum registro encontrado";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alterar</title>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background: url(Imagens/Background.jpg) no-repeat center center fixed; background-size: cover;">
<?php include("nav-bar.php"); ?>

              <div class="container" style="background-color: rgba(0, 0, 0, 0.66); color: white"><br>
              <h2 class="pt-4 pb-4 text-center" style="border-style: outset; font-family:verdana">Alteração de Mensalidade</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente-->
<br>
<form action="" method="post">

<div class="form-row">

<div class="form-group col-lg-3 col-md-6 col-sm-12">

<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />

        <label for="idmatricula">Matrícula</label>
        <input type="number" name="idmatricula" id="idmatricula" class="form-control text-center" value="<?php echo $linha['idmatricula'] ?>" disabled>
    
    </div>
<div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="dataRecebimento">Data de recebimento</label>
    <input type="date" name="dataRecebimento" id="dataRecebimento" class="form-control" value="<?php echo $linha['dataRecebimento'] ?>">
    
</div>
<div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="mesReferencia">Mês de referência</label>
    <select name="mesReferencia" class="form-control">
<option value="">Selecione</option>
<option value="1" <?= ($linha['mesReferencia'] == '1') ? "selected" : "" ?>>Janeiro</option>
<option value="2" <?= ($linha['mesReferencia'] == '2') ? "selected" : "" ?>>Fevereiro</option>
<option value="3" <?= ($linha['mesReferencia'] == '3') ? "selected" : "" ?>>Março</option>
<option value="4" <?= ($linha['mesReferencia'] == '4') ? "selected" : "" ?>>Abril</option>
<option value="5" <?= ($linha['mesReferencia'] == '5') ? "selected" : "" ?>>Maio</option>
<option value="6" <?= ($linha['mesReferencia'] == '6') ? "selected" : "" ?>>Junho</option>
<option value="7" <?= ($linha['mesReferencia'] == '7') ? "selected" : "" ?>>Julho</option>
<option value="8" <?= ($linha['mesReferencia'] == '8') ? "selected" : "" ?>>Agosto</option>
<option value="9" <?= ($linha['mesReferencia'] == '9') ? "selected" : "" ?>>Setembro</option>
<option value="10" <?= ($linha['mesReferencia'] == '10') ? "selected" : "" ?>>Outubro</option>
<option value="11" <?= ($linha['mesReferencia'] == '11') ? "selected" : "" ?>>Novembro</option>
<option value="12" <?= ($linha['mesReferencia'] == '12') ? "selected" : "" ?>>Dezembro</option>


</select>
    
</div>
<div class="col-lg-3 col-md-6 col-sm-12">
  <div class="form-group">
<label for="formaRecebimento">Forma de Recebimento</label>
<select name="formaRecebimento" class="form-control">
<option value="1" <?= ($linha['formaRecebimento'] == '1') ? "selected" : "" ?>>Dinheiro</option>


</select>
</div> 

</div>
</div>
<div class="form-row">


<div class="form-group col-lg-3 col-md-6 col-sm-12">
        <label for="valor">Valor</label>
        <select name="valor" id="valor" class="form-control" onblur="mostraValorInicial()">
    <option value="">Selecione</option>
    <option value="69"  <?= ($linha['valor'] == '69') ? "selected" : "" ?>>Baixo - R$69,00</option>
    <option value="99"  <?= ($linha['valor'] == '99') ? "selected" : "" ?>>Bateria - R$99,00</option>
    <option value="109" <?= ($linha['valor'] == '109') ? "selected" : "" ?>>Guitarra - R$109,00</option>
    <option value="79"  <?= ($linha['valor'] == '79') ? "selected" : "" ?>>Violão - R$79,00</option>
    <option value="119" <?= ($linha['valor'] == '119') ? "selected" : "" ?>>Violino - R$119,00</option>
    <option value="69"  <?= ($linha['valor'] == '89') ? "selected" : "" ?>>Ukulele - R$89,00</option>
</select>
    </div>
<div class="form-group col-lg-2 col-md-6 col-sm-12">
        <label for="desconto">Desconto</label><br>
        <input type="number" name="desconto" id="desconto" class="form-control" onblur="subtrair()"  value="<?php echo $linha['desconto'] ?>">


</select>
    </div>
<div class="form-group col-lg-2 col-md-6 col-sm-12">
            <label for="juros">Juros</label>
            <input type="number" name="juros" id="juros" onblur="soma()" class="form-control" value="<?php echo $linha['juros'] ?>">
        </div>
        <div class="form-group col-lg-2 col-md-6 col-sm-12">
            <label for="juros">Valor Total</label>
            <input type="number" name="total" disabled="true" id="total" value="0.00" class="form-control text-center" style="background-color: #32CD32;">
        </div>
        <div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="status">Status</label>
    <select name="status" class="form-control">
<option value="1" <?= ($linha['status'] == '1') ? "selected" : "" ?>>Ativo</option>
<option value="0" <?= ($linha['status'] == '0') ? "selected" : "" ?>>Inativo</option>
</select>
    
</div>
</div>




       <br> <div class="text-center">
       <div class="text-right"> <!-- div alinhamento de botões à direita -->
            <a href="dashboard/paginas/ltr/Index.php" class="btn btn-danger" name="cancelar" value="cancelar">Cancelar</a>
            <button type="submit" class="btn btn-success" name="cadastrar" value="cadastrar">Salvar</button>
            </div> <!-- div alinhamento de botões à direita -->
            </div>
</form>
                  <br><br>
            </div>
    
</body>
</html>

<script type="text/javascript">
function valida(){
 if(document.getElementById("valor").value == "" || document.getElementById("desconto").value == ""){
 alert("Valor não informador");
 return false;
 }else{
 if(validanumero()){
 return true;
 }else{
 return false;
 }
 }
 
}
function soma(){
 var valor = document.getElementById("valor").value;
 var juros = document.getElementById("juros").value;
 var total = parseInt(valor) + parseInt(juros);
 document.getElementById("total").value = total;
 
}
 function subtrair(){
 var valor = document.getElementById("valor").value;
 var desconto = document.getElementById("desconto").value;
 var total = parseInt(valor) - parseInt(desconto);
 document.getElementById("total").value = total;
 
} 

function mostraValorInicial(){
 var valor = document.getElementById("valor").value;
 var total = parseInt(valor);
 document.getElementById("total").value = total;
 
} 
 </script>