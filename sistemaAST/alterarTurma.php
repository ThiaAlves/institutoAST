<?php 
require ("conexao.php");
require_once('funcoes.php');

//verifica se foi clicado no botão cadastrar
if (isset($_POST['cadastrar'])) {
    $id = $_POST['id'];
    $diaSemana = $_POST['diaSemana'];
    $horario = $_POST['horario'];
    $qtdAluno = $_POST['qtdAluno'];
    $idsala = $_POST['idsala'];
    $idcurso = $_POST['idcurso'];
    $status = $_POST['status'];
    if ($status == "1"){
        $status = 1;
    }else{
        $status = 0;
    }

    $sql = "update turma 
               set diaSemana     = '{$diaSemana}', 
                   horario     = '{$horario}', 
                   qtdAluno     = '{$qtdAluno}', 
                   idsala = {$idsala},
                   idcurso = {$idcurso},
                   status = {$status}
             where id       = {$id}"; 
    
    mysqli_query($conexao, $sql);
    echo "<div class='alert alert-success  alert-dismissible fade show text-center' role='alert' style='font-family: cornerstone; width:450px;
     height:150px; background:rose; position:absolute; z-index:100; top:50%; left:33%; color:white; display: flex; flex-direction: row;
     justify-content: center;  align-items: center'>
     <span class='mdi mdi-check-circle-outline'></span> <h3 style='color:green'>Registro atualizado com sucesso!</h3>
     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
       <span aria-hidden='true'>&times;</span>
     </button>
   </div>";  
}

$sql = "select * from turma where id = " . $_GET['id'];

$resultado = mysqli_query($conexao, $sql) or die("<div class='alert alert-success  alert-dismissible fade show text-center' role='alert' style='font-family: cornerstone; width:450px;
height:150px; background:rose; position:absolute; z-index:100; top:50%; left:33%; color:white; display: flex; flex-direction: row;
justify-content: center;  align-items: center'>
<span class='mdi mdi-check-circle-outline'></span> <h3 style='color:red'>Erro ao Pesquisar!</h3>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
</div>");

if (mysqli_num_rows($resultado) > 0) {
    $linha = mysqli_fetch_assoc($resultado);
    
    $id = $linha['id'];
    $diaSemana = $linha['diaSemana'];
    $horario = $linha['horario'];
    $qtdAluno = $linha['qtdAluno'];
    $idsala = $linha['idsala'];
    $idcurso = $linha['idcurso'];
    $status = $linha['status'];
    if ($status == "1"){
        $status = 1;
    }else{
        $status = 0;
    }
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
              <h2 class="pt-5 pb-5 text-center" style="border-style: outset; font-family:verdana">Alteração de Turmas</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente--><br>
<br>
              <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />

                <div class="form-row">
                   
            
                <div class="form-group col-lg-3 col-md-6 col-sm-12">
                <label for="diaSemana">Dia da Semana</label>
                <select name="diaSemana" class="form-control">
    <option value="segunda" <?= ($linha['diaSemana'] == 'segunda') ? "selected" : "" ?>>Segunda-feira</option>
    <option value="terca" <?= ($linha['diaSemana'] == 'terca') ? "selected" : "" ?>>Terça-feira</option>
    <option value="quarta" <?= ($linha['diaSemana'] == 'quarta') ? "selected" : "" ?>>Quarta-feira</option>
    <option value="quinta" <?= ($linha['diaSemana'] == 'quinta') ? "selected" : "" ?>>Quinta-feira</option>
    <option value="sexta" <?= ($linha['diaSemana'] == 'sexta') ? "selected" : "" ?>>Sexta-feira</option>



</select>
            </div>
            
                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                <label for="horario">Horário</label>
                <input type="time" name="horario" id="horario" class="form-control" value="<?php echo $linha['horario'] ?>">
            </div>
            <div class="form-group col-lg-2 col-md-6 col-sm-12">
                    <label for="qtdAluno">Quantidade de Alunos</label>
                    <input type="number" name="qtdAluno" id="qtdAluno" class="form-control" value="<?php echo $linha['qtdAluno'] ?>">
                </div>
                <div class="form-group col-lg-1 col-md-6 col-sm-12">
                <label for="idsala">Sala</label>
                <select name="idsala" id="idsala" class="form-control">
                  <option value="">--</option>
                  <?php echo getComboboxSala($linha['idsala']) ?>
                </select>
            
            </div>
                    <div class="form-group col-lg-2 col-md-6 col-sm-12">
                        <label for="idcurso">Curso</label>
                        <select name="idcurso" id="idcurso" class="form-control">
                          <option value="">--</option>
                          <?php echo getComboboxCurso($linha['idcurso']) ?>
                        </select>
                    
                    </div>
                    <div class="form-group col-lg-2 col-md-6 col-sm-12">
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

