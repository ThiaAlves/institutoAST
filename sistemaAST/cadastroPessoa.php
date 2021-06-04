<?php

//verifica se foi clicado no botão cadastrar
if (isset($_POST['cadastrar'])) {

      //Conecta no BD
      require("conexao.php");

    //Pega os dados do formulário
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $senha = $_POST['senha'];
    $criptografada = md5($senha);
    $tipoPessoa = $_POST['tipoPessoa'];

   //VALIDAÇÃO
   $sql = "select * from pessoa where cpf = {$cpf}";
   $resultado = mysqli_query($conexao, $sql) or die("Erro ao cadastrar");
   $linhas = mysqli_num_rows($resultado);


   if ($linhas >= 1) {
    echo "<div class='alert alert-success  alert-dismissible fade show text-center' role='alert' style='font-family: cornerstone; width:450px;
    height:150px; background:rose; position:absolute; z-index:100; top:50%; left:33%; color:white; display: flex; flex-direction: row;
    justify-content: center;  align-items: center'>
    <span class='mdi mdi-check-circle-outline'></span> <h3 style='color:red'>Falha no cadastro! CPF já cadastrado</h3>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
} else {
   //Preparação da SQL 
   $sql = "INSERT INTO pessoa (nome, genero, dataNascimento,  cpf, telefone, cidade, estado, endereco, numero, email, cep, senha, tipoPessoa)
   values ('{$nome}', '{$genero}', '{$dataNascimento}', '{$cpf}', '{$telefone}','{$cidade}', '{$estado}', '{$endereco}', '{$numero}', '{$email}', '{$cep}', '{$criptografada}', '{$tipoPessoa}')";
    
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
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>

        
    <!-- Custom CSS -->
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background: url(Imagens/Background.jpg) no-repeat center center fixed; background-size: cover;">
<?php include("nav-bar.php"); ?>

              <div class="container" style="background-color: rgba(0, 0, 0, 0.66); color: white"><br>
              <h2 class="pt-4 pb-4 text-center" style="border-style: outset; font-family:verdana">Cadastro de Alunos/Funcionários</h2> <!-- pt é padding top e pb padding botton | Margem cima e baixo respectivamente-->
<br><br><br>
              <form action="" method="post">

                <div class="form-row">
                    <div class="col-lg-5 col-md-6 col-sm-12">
                  <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe o seu nome completo...">
            </div> 
                </div>
            
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                    <label for="dataNascimento">Data Nascimento</label>
                    <input type="date" name="dataNascimento" id="dataNacimento" min="1920-01-01" max="2018-01-01" 
                    class="form-control">
                    
                </div>
                <div class="form-group col-lg-2 col-md-6 col-sm-12">
                <label for="genero">Gênero</label>
                <select name="genero" class="form-control">
    <option value="">Selecione</option>
    <option value="masculino">Masculino</option>
    <option value="feminino">Feminino</option>


</select>
            </div>
            <div class="form-group col-lg-2 col-md-6 col-sm-12">
                        <label for="tipoPessoa">Tipo de pessoa</label><br>
                        <input type="radio" name="tipoPessoa" value="AL" onfocus="disable()" checked > Aluno.
                         <br>
                        <input type="radio" name="tipoPessoa" value="FN" onfocus="enable()"> Funcionário.
                    </div>
            </div>
            
            <div class="form-row">
                    <div class="form-group col-lg-3 col-md-6 col-sm-12">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Informe o e-mail...">
                    </div>
                     <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <label for="nome">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Informe a senha...">
                        </div> 
                        <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <label for="cpf">CPF</label>
                            <input type="number" name="cpf" id="cpf" class="form-control" size="11" maxlength="11" placeholder="Informe o CPF...">
                            <small class="form-text text muted">*Apenas números.</small>
                        </div>

                <div class="form-group col-lg-3 col-md-6 col-sm-12">
                <label for="telefone">Telefone</label>
                <input type="number" name="telefone" id="telefone" class="form-control" placeholder="Informe o telefone...">
                <small class="form-text text muted">*Apenas números.</small>
                    </div>
                    </div>
                  <div class="form-row"> 
                    <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="form-group">
                  <label for="cep">CEP</label>
                        <input type="number" name="cep" id="cep" class="form-control" placeholder="Informe o CEP...">
                        <small class="form-text text muted">*Apenas números.</small>
            </div> 
                </div>
            
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Informe o endereço..">
                    
                </div>
                <div class="form-group col-lg-1 col-md-6 col-sm-12">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" class="form-control" placeholder="0000">
                    
                </div>
                      <div class="form-group col-lg-3 col-md-6 col-sm-12">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Informe a cidade..">
                    
                </div>
                      <div class="form-group col-lg-2 col-md-6 col-sm-12">
                    <label for="estado">Estado</label>
                    <select name="estado" class="form-control">
    <option value="PR">Paraná</option>
</select>
                </div>
                      
            </div>
                       <br><br>
                       <div class="text-right"> <!-- div alinhamento de botões à direita -->
                            <a href="dashboard/paginas/ltr/Index.php" class="btn btn-danger" name="cancelar" value="cancelar">Cancelar</a>
                            <button type="reset"  class="btn btn-secondary" name="limpar" value="limpar">Limpar</button>
                            <button type="submit" class="btn btn-success" name="cadastrar" value="cadastrar" id="cadastro" onclick="cadastroRealizado()">Salvar</button>
                            </div> <!-- div alinhamento de botões à direita -->
              </form>
                  <br><br>
            </div>
    <!-- Bibliotecas importadas para pegar valor da cidade automaticamente com o cep
    <script type='text/javascript' src='cep.js'></script>
    <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
     -->
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
</body>
</html>



