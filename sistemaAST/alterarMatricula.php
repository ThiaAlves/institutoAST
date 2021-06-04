<?php 
require ("conexao.php");
require_once('funcoes.php');

//verifica se foi clicado no botão cadastrar
if (isset($_POST['cadastrar'])) {
    $id = $_POST['id'];
    $diaVencimento = $_POST['diaVencimento'];
    $idpessoa = $_POST['idpessoa'];
    $idturma = $_POST['idturma'];
    $status = $_POST['status'];
    if ($status == "1"){
        $status = 1;
    }else{
        $status = 0;
    }

    $sql = "update matricula 
               set diaVencimento     = '{$diaVencimento}', 
                   idpessoa = {$idpessoa},
                   idturma = {$idturma},
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

$sql = "select * from matricula where id = " . $_GET['id'];

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
    $diaVencimento = $linha['diaVencimento'];
    $idpessoa = $linha['idpessoa'];
    $idturma = $linha['idturma'];
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
              <h2 class="pt-4 pb-4 text-center" style="border-style: outset; font-family:verdana">Alteração de Matrícula</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente-->
<br>
              <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />

                <div class="form-row">
                   
            
                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label for="pessoa">Aluno</label>
                        <select name="idpessoa" id="idpessoa" class="form-control">
                          <option value="">Selecione o Aluno</option>
                          <?php echo getComboboxPessoa1($linha['idpessoa']) ?>
                        </select>
            </div>
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
            <label for="data">Dia de Vencimento</label>
                <input type="number" name="diaVencimento" id="diaVencimento" class="form-control" value="<?php echo $linha['diaVencimento']?>">
            </div>
            
                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                <label for="turma">Turma</label>
                        <select name="idturma" id="idturma" class="form-control">
                          <option value="">Selecione a Turma</option>
                          <?php echo getComboboxTurma1($linha['idturma']) ?>
                        </select>
            </div>
            
                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
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

