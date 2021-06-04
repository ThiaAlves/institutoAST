<?php

//verifica se foi clicado no botão cadastrar
if (isset($_POST['cadastrar'])) {
    //Pega os dados do formulário
    $nome = $_POST['nome'];
    $duracao = $_POST['duracao'];
    $turno = $_POST['turno'];
    $qtdInstrumento = $_POST['qtdInstrumento'];
    $instrumento = $_POST['instrumento'];
    //$cargaHoraria = $_POST['cargaHoraria'];


    //Preparação da SQL 
    $sql = "INSERT INTO curso (nome, duracao, turno,  qtdInstrumento, instrumento)
         values ('{$nome}', '{$duracao}', '{$turno}', '{$qtdInstrumento}', '{$instrumento}')";
    
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
              <h2 class="pt-5 pb-5 text-center" style="border-style: outset; font-family:verdana">Cadastro de Curso</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente--><br>

              <form action="" method="post">

                <div class="form-row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                <label for="nome">Nome do Curso</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe o nome do curso...">
            </div> 
                </div>
            
                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                <label for="duracao">Duração</label>
                <select name="duracao" class="form-control">
    <option value="">Selecione</option>
    <option value="6m">6 meses</option>
    <option value="12m">12 meses</option>
    <option value="18m">18 meses</option>
    <option value="24m">24 meses</option>


</select>
            </div>
            
                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                <label for="turno">Turno</label>
                <select name="turno" class="form-control">
    <option value="">Selecione</option>
    <option value="tarde">Tarde</option>
    <option value="noite">Noite</option>


</select>
            </div>
            <div class="form-group col-lg-2 col-md-6 col-sm-12">
                        <label for="instrumento">Instrumento</label>
                        <select name="instrumento" class="form-control">
    <option value="">Selecione</option>
    <option value="1">Violão</option>
    <option value="2">Guitarra</option>
    <option value="3">Baixo</option>
    <option value="4">Bateria</option>
    <option value="5">Ukulele</option>
    <option value="6">Violino</option>


</select>
                    
                    </div>
                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <label for="qtdInstrumento">Quantidade de Instrumentos</label>
                            <input type="number" name="qtdInstrumento" id="qtdInstrumento" class="form-control">
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


