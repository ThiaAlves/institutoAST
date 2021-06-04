<?php
//Conecta no BD //require-->obrigatoriamente deve achar o arquivo
require("conexao.php");
require("funcoes.php");

//Preparação da SQL
$sql = "select * from curso";

//Executa SQL
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <title>Listagem</title>
</head>
<body style="background: url(Imagens/Background.jpg) no-repeat center center fixed; background-size: cover;">
<?php include("nav-bar.php"); ?>


    <div class="container" style="background-color: rgba(0, 0, 0, 0.66); color: white">

        <div class="container" ><br><br>
            <div class="text-center border border-white rounded"><h3 class="pt-3">Cursos cadastrados no sistema</h3>
             </div><br><br>
        </div>  

        <div class="table-responsive row">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Duração</th>
                        <th scope="col">Turno</th>
                        <th scope="col">Número de Instumentos</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>

                <tbody style= "color: white">
                
                    <?php 
                    if(mysqli_num_rows($resultado) > 0){
                        while($linhas = mysqli_fetch_assoc($resultado)){ ?>
                      
                            <tr>
                                <td>  <?php echo $linhas['id']; $id = $linhas['id'] ?>  </td>
                                <td>  <?php echo $linhas['nome']?>  </td>
                                <td>  <?php echo $linhas['duracao']?>  </td>
                                <td>  <?php echo $linhas['turno']?>  </td>
                                <td>  <?php echo $linhas['qtdInstrumento']?>  </td>
                                <td>  <?php if($linhas['status'] == 1){echo "Ativo";}else{echo "Inativo";}?>  </td>

                                <td>
                                <?php 
                                    $linkAlterar = "<a class='btn btn-primary btn-sm btn-block' href='alterarCurso.php?id={$id}'>Alterar</a>";
                                    echo "{$linkAlterar}";
                                
                                    $linkExcluir = "<a class='btn btn-danger btn-sm btn-block' href='excluirCurso.php?id={$id}'  onclick='solicitaExclusao()'>Excluir</a>"; 
                                    echo "{$linkExcluir}";
                                ?>
                                </td>
                            </tr>
                          
                    <?php }} else {echo "Nenhum registro encontrado";}  ?>
    
                </tbody>
            </table>
        </div>
    </div>



</body>
</html>

<?php
function cadastroExcluido()
  {
    return 'Registro excluido com sucesso!';
  }
?>



<script>
    
    function solicitaExclusao()
    {
        var msg = ' <?php echo cadastroExcluido(); ?> ';
        alert(msg);
    }
    
</script>