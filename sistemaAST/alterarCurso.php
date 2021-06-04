<?php 
    require("conexao.php");

    //Preparação da SQL
    $sql = "select * from curso where id = ".$_GET['id'];

    //Executa SQL
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao alterar");

    //Pega o valor da consulta
    $linha = mysqli_fetch_assoc($resultado);

    //Atualiza o cliente
    if(isset($_POST['cadastrar'])){
        //pega os dados 
        $id = $_GET['id'];
        $nome = $_POST['nome'];
        $duracao = $_POST['duracao'];
        $turno = $_POST['turno'];
        $qtdInstrumento = $_POST['qtdInstrumento'];
        $instrumento = $_POST['instrumento'];
        $status = $_POST['status'];
        if ($status == "1"){
            $status = 1;
        }else{
            $status = 0;
        }

        //Prepara SQL
        $sql = "update curso set nome  = '{$nome}', 
                                duracao = '{$duracao}',
                                turno = '{$turno}',
                                qtdInstrumento    = '{$qtdInstrumento}',
                                instrumento = '{$instrumento}',
                                status = '{$status}'
                                where id = {$id}"; 
        
        //Executa SQL
        $resultado = mysqli_query($conexao, $sql) or die("<div class='alert alert-success  alert-dismissible fade show text-center' role='alert' style='font-family: cornerstone; width:450px;
        height:150px; background:rose; position:absolute; z-index:100; top:50%; left:33%; color:white; display: flex; flex-direction: row;
        justify-content: center;  align-items: center'>
        <span class='mdi mdi-check-circle-outline'></span> <h3 style='color:red'>Falha no cadastro!</h3>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>");
      
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
    <title>Alteração</title>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background: url(Imagens/Background.jpg) no-repeat center center fixed; background-size: cover;">
<!-- Nav-bar -->
<?php include("nav-bar.php"); ?> 

<div><br></div>

<div class="container" style="background-color: rgba(0, 0, 0, 0.66); color: white"><br>
<h2 class="pt-4 pb-4 text-center" style="border-style: outset; font-family:verdana">Alteração de Curso</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente-->
<br><br><br>

<form action="" method="post">

<div class="form-row">
    <div class="col-lg-2 col-md-6 col-sm-12">
  <div class="form-group">
<label for="nome">Nome do Curso</label>
<input type="text" name="nome" id="nome" class="form-control" value="<?php echo $linha['nome']?>">
</div> 
</div>

<div class="form-group col-lg-2 col-md-6 col-sm-12">
<label for="duracao">Duração</label>
<select name="duracao" class="form-control">
<option value="">Selecione</option>
<option value="6meses" <?= ($linha['duracao'] == '6meses') ? "selected" : "" ?>>6 meses</option>
<option value="1ano" <?= ($linha['duracao'] == '1ano') ? "selected" : "" ?>>1 ano</option>
<option value="1anoemeio" <?= ($linha['duracao'] == '1anoemeio') ? "selected" : "" ?>>1 ano e meio</option>
<option value="2anos" <?= ($linha['duracao'] == '2anos') ? "selected" : "" ?>>2 anos</option>


</select>
</div>

<div class="form-group col-lg-2 col-md-6 col-sm-12">
<label for="turno">Turno</label>
<select name="turno" class="form-control">
<option value="">Selecione</option>
<option value="tarde" <?= ($linha['turno'] == 'tarde') ? "selected" : "" ?>>Tarde</option>
<option value="noite" <?= ($linha['turno'] == 'noite') ? "selected" : "" ?>>Noite</option>


</select>
</div>
<div class="form-group col-lg-2 col-md-6 col-sm-12">
        <label for="instrumento">Instrumento</label>
        <select name="instrumento" class="form-control">
<option value="">Selecione</option>
<option value="1" <?= ($linha['instrumento'] == '1') ? "selected" : "" ?>>Violão</option>
<option value="2" <?= ($linha['intrumento'] == '2') ? "selected" : "" ?>>Guitarra</option>
<option value="3" <?= ($linha['instrumento'] == '3') ? "selected" : "" ?>>Baixo</option>
<option value="4" <?= ($linha['instrumento'] == '4') ? "selected" : "" ?>>Bateria</option>
<option value="5" <?= ($linha['instrumento'] == '5') ? "selected" : "" ?>>Ukulele</option>
<option value="6" <?= ($linha['instrumento'] == '6') ? "selected" : "" ?>></option>


</select>
    
    </div>
    <div class="form-group col-lg-3 col-md-6 col-sm-12">
            <label for="qtdInstrumento">Quantidade de Instrumentos</label>
            <input type="number" name="qtdInstrumento" id="qtdInstrumento" class="form-control" value="<?php echo $linha['qtdInstrumento']?>" >
        </div>
        <div class="form-group col-lg-1 col-md-6 col-sm-12">
    <label for="status">Status</label>
    <select name="status" class="form-control">
<option value="1" <?= ($linha['status'] == '1') ? "selected" : "" ?>>Ativo</option>
<option value="0" <?= ($linha['status'] == '0') ? "selected" : "" ?>>Inativo</option>
</select>
    
</div>
</div>



        

    
  
       <br>
       <div class="text-right"> <!-- div alinhamento de botões à direita -->
            <a href="dashboard/paginas/ltr/Index.php" class="btn btn-danger" name="cancelar" value="cancelar">Cancelar</a>
            <button type="submit" class="btn btn-success" name="cadastrar" value="cadastrar">Salvar</button>
            </div> <!-- div alinhamento de botões à direita -->
</form>
                  <br><br>
            </div>
    

    

</body>
</html>
<script>
    
    function alteracaoSolicitado()
    {
        var msg = ' <?php echo alteracaoFeita();  ?> ';
        alert(msg);
    }
    
</script>
   