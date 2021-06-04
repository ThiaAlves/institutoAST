<?php 
    require("conexao.php");

    //Preparação da SQL
    $sql = "select * from pessoa where id = ".$_GET['id'];

    //Executa SQL
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao alterar");

    //Pega o valor da consulta
    $linha = mysqli_fetch_assoc($resultado);

    //Atualiza o cliente
    if(isset($_POST['cadastrar'])){
        //pega os dados 
        $id = $_GET['id'];
        $nome = $_POST['nome'];
        $dataNascimento = $_POST['dataNascimento'];
        $genero = $_POST['genero'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $telefone = $_POST['telefone'];
        $cidade = $_POST['cidade'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $cep = $_POST['cep'];
        $tipoPessoa = $_POST['tipoPessoa'];
        if ($tipoPessoa == "AL"){
            $tipoPessoa = "AL";
        }else{
            $tipoPessoa = "FN";
        }
        //$dataAdmissao = $_POST['dataAdmissao'];
        $dataDemissao = $_POST['dataDemissao'];
        $status = $_POST['status'];
        if ($status == "1"){
            $status = 1;
        }else{
            $status = 0;
        }

        //Prepara SQL
        $sql = "update pessoa set nome  = '{$nome}', 
                                dataNascimento = '{$dataNascimento}',
                                genero = '{$genero}',
                                telefone = '{$telefone}',
                                senha = '{$senha}',
                                cidade = '{$cidade}',
                                endereco = '{$endereco}',
                                numero = '{$numero}',
                                cep = '{$cep}',
                                tipoPessoa = '{$tipoPessoa}',
                                dataDemissao = '{$dataDemissao}',
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
<h2 class="pt-4 pb-4 text-center" style="border-style: outset; font-family:verdana">Alteração de Alunos/Funcionários</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente-->
<br><br><br>

              <form action="" method="post">

<div class="form-row">
    <div class="col-lg-6 col-md-6 col-sm-12">
  <div class="form-group">
<label for="nome">Nome Completo</label>
<input type="text" name="nome" id="nome" class="form-control"  value="<?php echo $linha['nome']?>">
</div> 
</div>

<div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="dataNascimento">Data Nascimento</label>
    <input type="date" name="dataNascimento" id="dataNacimento" min="1920-01-01" max="2018-01-01" class="form-control" value="<?php echo $linha['dataNascimento']?>">
    
</div>
<div class="form-group col-lg-3 col-md-6 col-sm-12">
<label for="genero">Gênero</label>
<select name="genero" class="form-control" value="<?=($linha['genero'] == 'masculino') ? "selected" : "genero" ?>">
<option value="">Selecione</option>
<option value="masculino" <?= ($linha['genero'] == 'masculino') ? "selected" : "" ?>>Masculino</option>
<option value="feminino" <?= ($linha['genero'] == 'feminino') ? "selected" : "" ?>>Feminino</option>


</select>
</div>
</div>

<div class="form-row">
    <div class="form-group col-lg-3 col-md-6 col-sm-12">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" disabled value="<?php echo $linha['email']?>">
    </div>
     <div class="form-group col-lg-3 col-md-6 col-sm-12">
            <label for="nome">Senha</label>
<input type="password" name="senha" id="senha" class="form-control" placeholder="Informe a nova senha...">
        </div> 
        <div class="form-group col-lg-3 col-md-6 col-sm-12">
            <label for="cpf">CPF</label>
            <input type="number" name="cpf" id="cpf" disabled class="form-control" value="<?php echo $linha['cpf']?>">
            <small class="form-text text muted">*Apenas números.</small>
        </div>

<div class="form-group col-lg-3 col-md-6 col-sm-12">
<label for="telefone">Telefone</label>
<input type="number" name="telefone" id="telefone" class="form-control" value="<?php echo $linha['telefone']?>">
<small class="form-text text muted">*Apenas números.</small>
    </div>
    </div>
  <div class="form-row"> 
    <div class="col-lg-3 col-md-6 col-sm-12">
  <div class="form-group">
  <label for="cep">CEP</label>
        <input type="number" name="cep" id="cep" class="form-control" value="<?php echo $linha['cep']?>">
        <small class="form-text text muted">*Apenas números.</small>
</div> 
</div>

<div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="endereco">Endereço</label>
    <input type="text" name="endereco" id="endereco" class="form-control" value="<?php echo $linha['endereco']?>">
    
</div>
<div class="form-group col-lg-2 col-md-6 col-sm-12">
    <label for="numero">Número</label>
    <input type="number" name="numero" id="numero" class="form-control" value="<?php echo $linha['numero']?>">
    
</div>
      <div class="form-group col-lg-2 col-md-6 col-sm-12">
    <label for="cidade">Cidade</label>
    <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo $linha['cidade']?>">
    
</div>
      <div class="form-group col-lg-2 col-md-6 col-sm-12">
    <label for="estado">Estado</label>
    <select name="estado" disabled class="form-control">
<option value="PR">Paraná</option>
</select>
</div>
      
</div>
<div class="form-row"> 
<div class="form-group col-lg-3 col-md-6 col-sm-12">
        <label for="tipoPessoa">Tipo de pessoa</label><br>
        <select name="tipoPessoa" class="form-control">
<option value="AL" <?= ($linha['tipoPessoa'] == 'AL') ? "selected" : "" ?>>Aluno</option>
<option value="FN" <?= ($linha['tipoPessoa'] == 'FN') ? "selected" : "" ?>>Funcionário</option>
</select>
    </div>

    <div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="dataAdmissao">Data Admissão</label>
    <input type="date" name="dataAdmissao" id="dataAdmissao" class="form-control" disabled value="<?php echo $linha['dataAdmissao']?>">
    
</div>
<div class="form-group col-lg-3 col-md-6 col-sm-12" id="campodataDemissao">
    <label for="dataDemissao">Data Demissão</label>
    <input type="date" name="dataDemissao" id="dataDemissao" class="form-control" value="<?php echo $linha['dataDemissao']?>">
    
</div>
<div class="form-group col-lg-3 col-md-6 col-sm-12">
    <label for="status">Status</label>
    <select name="status" class="form-control">
<option value="1" <?= ($linha['status'] == '1') ? "selected" : "" ?>>Ativo</option>
<option value="0"  <?= ($linha['status'] == '0') ? "selected" : "" ?>>Inativo</option>
</select>
    
</div>
</div>
      

       <br><br>
       <div class="text-right"> <!-- div alinhamento de botões à direita -->
            <a href="dashboard/paginas/ltr/Index.php" class="btn btn-danger" name="cancelar" value="cancelar">Cancelar</a>
            <button type="submit" class="btn btn-success" name="cadastrar" value="cadastrar">Salvar</button>
            </div> <!-- div alinhamento de botões à direita -->
</form>
                  <br><br>
            </div>
    

    

</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script type="text/javascript">
		$("#cep").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
					$("#endereco").val(resposta.logradouro);
					//$("#complemento").val(resposta.complemento);
					//$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.localidade);
					//$("#uf").val(resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#numero").focus();
				}
			});
		});
	</script>
    <!-- https://sweetalert2.github.io/#download -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
function disable() {
    document.getElementById('campodataDemissao').hidden=true;

}
function enable() {
    document.getElementById('campodataDemissao').hidden=false;

}

</script>