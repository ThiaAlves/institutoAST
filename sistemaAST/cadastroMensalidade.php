<?php
require_once('funcoes.php');
//verifica se foi clicado no botão cadastrar
if (isset($_POST['cadastrar'])) {
    //Pega os dados do formulário
    $valor = $_POST['valor'];
    $mesReferencia = $_POST['mesReferencia'];
    $dataRecebimento = $_POST['dataRecebimento'];
    $desconto = $_POST['desconto'];
    $juros = $_POST['juros'];
    $formaRecebimento = $_POST['formaRecebimento'];
    $matricula = $_POST['matricula'];

  
    //Preparação da SQL 
    $sql = "INSERT INTO mensalidade (valor, mesReferencia,  dataRecebimento, desconto, juros, formaRecebimento, idmatricula)
         values ('{$valor}', '{$mesReferencia}', '{$dataRecebimento}', '{$desconto}','{$juros}', '{$formaRecebimento}', '{$matricula}')";
    
    //Conecta no BD
    require("conexao.php");

    //Executa SQL
    mysqli_query($conexao, $sql) or die("Erro ao cadastrar");

    echo "<div class='alert alert-success  alert-dismissible fade show text-center' role='alert' style='font-family: cornerstone; width:450px;
    height:150px; background:rose; position:absolute; z-index:100; top:50%; left:33%; color:white; display: flex; flex-direction: row;
    justify-content: center;  align-items: center'>
    <span class='mdi mdi-check-circle-outline'></span> <h3 style='color:green'>Cadastro realizado com sucesso!</h3>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background: url(Imagens/Background.jpg) no-repeat center center fixed; background-size: cover;">
<?php include("nav-bar.php"); ?>

              <div class="container" style="background-color: rgba(0, 0, 0, 0.66); color: white"><br>
              <h2 class="pt-5 pb-5 text-center" style="border-style: outset; font-family:verdana">Cadastro de Mensalidade</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente--><br>

              <form action="" method="post">

                <div class="form-row">
                
                <div class="form-group col-lg-3 col-md-6 col-sm-12">
                        <label for="matricula">Nome</label>
                        <select name="matricula" id="matricula" class="form-control">
                <?php echo getComboboxMatricula() ?></select>
                    
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                <label for="formaRecebimento">Forma de Recebimento</label>
                <select name="formaRecebimento" class="form-control">
    <option value="1">Dinheiro</option>
</select>
            </div> 
            
                </div>
            
                <div class="form-group col-lg-3 col-md-6 col-sm-12">
                    <label for="mesReferencia">Mês de referência</label>
                    <select name="mesReferencia" class="form-control">
    <option value="">Selecione</option>
    <option value="1">Janeiro</option>
    <option value="2">Fevereiro</option>
    <option value="3">Março</option>
    <option value="4">Abril</option>
    <option value="5">Maio</option>
    <option value="6">Junho</option>
    <option value="7">Julho</option>
    <option value="8">Agosto</option>
    <option value="9">Setembro</option>
    <option value="10">Outubro</option>
    <option value="11">Novembro</option>
    <option value="12">Dezembro</option>


</select>
                    
                </div>
                <div class="form-group col-lg-3 col-md-6 col-sm-12">
                    <label for="dataRecebimento">Data de recebimento</label>
                    <input type="date" name="dataRecebimento" id="dataRecebimento" class="form-control">
                    
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                        <label for="valor">Valor</label>
                        <select name="valor" id="valor" class="form-control" onblur="mostraValorInicial()">
    <option value="">Selecione</option>
    <option value="69">Baixo - R$69,00</option>
    <option value="99">Bateria - R$99,00</option>
    <option value="109">Guitarra - R$109,00</option>
    <option value="79">Violão - R$79,00</option>
    <option value="119">Violino - R$119,00</option>
    <option value="89">Ukulele - R$89,00</option>
</select>
                    
                    </div>
                <div class="form-group col-lg-3 col-md-6 col-sm-12">
                        <label for="desconto">Desconto</label><br>
                        <input type="number" name="desconto" id="desconto" class="form-control" onblur="subtrair()"  value="0.00">


</select>
                    </div>
                <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <label for="juros">Juros</label>
                            <input type="number" name="juros" id="juros" class="form-control" onblur="soma()" value="0.00">
                        </div>
                        <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <label for="valorTotal">Valor Total</label>
                            <input type="number" name="total" disabled="true" id="total" value="0.00" class="form-control text-center" style="background-color: #32CD32;">
                        </div>
            </div>
            
            
            
                       <br> <div class="text-center">
                       <div class="text-right"> <!-- div alinhamento de botões à direita -->
                            <a href="dashboard/paginas/ltr/Index.php" class="btn btn-danger" name="cancelar" value="cancelar">Cancelar</a>
                            <button type="submit" class="btn btn-secondary" name="limpar" value="limpar">Limpar</button>
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
