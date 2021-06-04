<?php
if(isset($_POST['entrar'])) {

    //Pega os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    //Preparação do SQL
    $sql = "select *
                from pessoa
                where email = '{$email}'
                and senha = '{$senha}'
                and tipoPessoa = 'FN'
                and id = 1
                and status = 1";
    //Conecta no BD
    $conexao = mysqli_connect('localhost', 'id11686727_sistemaast' , 'sistemaast', 'id11686727_sistemaast');
    //Executa SQL
    $resultado = mysqli_query($conexao, $sql) or die("Erro no login.");
    
    //Retorna o número de linhas do Result Set
    $linhas = mysqli_num_rows($resultado);

    if ($linhas == 1){
        //Autenticação
       
        $linha = mysqli_fetch_assoc($resultado);

        session_start();

        $_SESSION['id'] = $linha['id'];
        $_SESSION['nome'] = $linha['nome'];
        header("location: ../sistemaAST/dashboard/index.php");  //Redirecionamento para o Dashboard

    } else { 
        //Mensagem de erro de login
        echo "<script>
        alert('Email ou Senha incorretos');
        window.location.href='login.php';
        </script>";
    }

}




?>