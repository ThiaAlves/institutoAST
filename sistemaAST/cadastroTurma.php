<?php

require_once('funcoes.php');

//verifica se foi clicado no botão cadastrar
if (isset($_POST['cadastrar'])) {
    //Pega os dados do formulário
    $diaSemana = $_POST['diaSemana'];
    $horario = $_POST['horario'];
    $qtdAluno = $_POST['qtdAluno'];
    $sala = $_POST['sala'];
    $curso = $_POST['curso'];


    //Preparação da SQL 
    $sql = "INSERT INTO turma (diaSemana, horario, qtdAluno, idsala , idcurso)
         values ('{$diaSemana}', '{$horario}', '{$qtdAluno}', '{$sala}', '{$curso}')";
    
    //Conecta no BD
    require("conexao.php");

    //Executa SQL
    mysqli_query($conexao, $sql) or die("<div class='alert alert-success  alert-dismissible fade show text-center' role='alert' style='font-family: cornerstone; width:450px;
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
    <title>Cadastro</title>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background: url(Imagens/Background.jpg) no-repeat center center fixed; background-size: cover;">
<?php include("nav-bar.php"); ?>

              <div class="container" style="background-color: rgba(0, 0, 0, 0.66); color: white"><br>
              <h2 class="pt-5 pb-5 text-center" style="border-style: outset; font-family:verdana">Cadastro de Turmas</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente--><br>

              <form action="" method="post">

                <div class="form-row">
                <div class="form-group col-lg-3 col-md-6 col-sm-12">
                <label for="diaSemana">Dia da Semana</label>
                <select name="diaSemana" class="form-control">
    <option value="">Selecione</option>
    <option value="segunda">Segunda-feira</option>
    <option value="terca">Terça-feira</option>
    <option value="quarta">Quarta-feira</option>
    <option value="quinta">Quinta-feira</option>
    <option value="sexta">Sexta-feira</option>
</select>

            </div>
            
                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                <label for="horario">Horário</label>
                <input type="time" name="horario" id="horario" class="form-control">
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                            <label for="qtdAluno">Quantidade de Alunos</label>
                            <input type="number" name="qtdAluno" id="qtdAluno" class="form-control">
                        </div>
                        <div class="form-group col-lg-1 col-md-6 col-sm-12">
                <label for="sala">Sala</label>
                <select name="sala" id="sala" class="form-control">
                <option value="">--</option>
                <?php echo getComboboxSala1() ?>
                
                </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-sm-12">
                        <label for="curso">Curso</label>
                        <select name="curso" id="curso" class="form-control">
                          <option value="">--</option>
                          <?php echo getComboboxCurso1() ?>
                        </select>
                    
                    </div>
               
               </div>
                
                  
                       <br>
                       <div class="text-right"> <!-- div alinhamento de botões à direita -->
                            <a href="dashboard/paginas/ltr/Index.php" class="btn btn-danger" name="cancelar" value="cancelar">Cancelar</a>
                            <button type="submit" class="btn btn-secondary" name="limpar" value="limpar">Limpar</button>
                            <button type="submit" class="btn btn-success" name="cadastrar" value="cadastrar">Salvar</button>
                            </div> <!-- div alinhamento de botões à direita -->
              </form>
                  <br><br>
            </div>
    
</body>
</html>


