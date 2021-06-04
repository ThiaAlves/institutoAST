<?php 
    require("conexao.php");

    //Preparação da SQL
    $sql = "select * from sala where id = ".$_GET['id'];

    //Executa SQL
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao alterar");

    //Pega o valor da consulta
    $linha = mysqli_fetch_assoc($resultado);

    //Atualiza o cliente
    if(isset($_POST['cadastrar'])){
        //pega os dados 
        $id = $_GET['id'];
        $qtdAluno = $_POST['qtdAluno'];
        $status = $_POST['status'];
        if ($status == "1"){
            $status = 1;
        }else{
            $status = 0;
        }

        //Prepara SQL
        $sql = "update sala set qtdAluno = '{$qtdAluno}',
                                status = '{$status}'
                                where id = {$id}"; 
        
        //Executa SQL
        $resultado = mysqli_query($conexao, $sql) or die("Erro ao alterar");

        echo "<div class='alert alert-success  alert-dismissible fade show text-center' role='alert' style='font-family: cornerstone; width:450px;
     height:150px; background:rose; position:absolute; z-index:100; top:50%; left:33%; color:white; display: flex; flex-direction: row;
     justify-content: center;  align-items: center'>
     <span class='mdi mdi-check-circle-outline'></span> <h3 style='color:green'>Alteração realizada com sucesso!</h3>
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
<h2 class="pt-4 pb-4 text-center" style="border-style: outset; font-family:verdana">Alteração de Salas</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente-->
<br><br><br>

<form action="" method="post">

<div class="form-row">
    <div class="col-lg-4 col-md-6 col-sm-12">
  <div class="form-group">
<label for="numeroSala">Número da Sala</label>
<input type="number" name="numeroSala" disabled id="numeroSala" class="form-control" value="<?php echo $linha['numeroSala']?>">
</div> 
</div>

<div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label for="qtdAluno">Capacidade de Alunos</label>
            <input type="number" name="qtdAluno" id="qtdAluno" class="form-control" value="<?php echo $linha['qtdAluno']?>">
        </div>
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
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

   