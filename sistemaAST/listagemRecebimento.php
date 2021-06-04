<?php
//Conecta no BD //require-->obrigatoriamente deve achar o arquivo
require("conexao.php");
require("funcoes.php");

//Preparação da SQL
$sql = "select mensalidade.idmatricula, mensalidade.dataRecebimento, mensalidade.valor, pessoa.nome as pessoa_nome, curso.nome as curso_nome
from mensalidade 
inner join matricula on matricula.id = mensalidade.idmatricula
inner join pessoa on pessoa.id = matricula.idpessoa
inner join turma on turma.id = matricula.idturma
inner join curso on curso.id = turma.idcurso
order by mensalidade.dataRecebimento
desc";

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
            <div class="text-center border border-white rounded"><h3 class="pt-3">Últimas mensalidades recebidas</h3>
             </div><br><br>
        </div>  

        <div class="table-responsive row">
        <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">N° Matrícula</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data Recebimento</th>
                        <th scope="col">Curso</th>
                    </tr>
                </thead>

                <tbody style= "color: white">
                
                    <?php 
                    if(mysqli_num_rows($resultado) > 0){
                        while($linhas = mysqli_fetch_assoc($resultado)){ ?>
                      
                            <tr>
                                <td>  <?php echo $linhas['idmatricula'] ?>  </td>
                                <td>  <?php echo $linhas['pessoa_nome'] ?>  </td>  
                                <td>  <?php echo $linhas['valor']?>  </td>
                                <td>  <?php echo converteData($linhas['dataRecebimento']) ?>  </td>
                                <td>  <?php echo $linhas['curso_nome']?>  </td>
                                


                               
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