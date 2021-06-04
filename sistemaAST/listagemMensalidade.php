<?php
//Conecta no BD //require-->obrigatoriamente deve achar o arquivo
require("conexao.php");
require("funcoes.php");

if (isset($_POST['pesquisar'])) {
    $where = "";
    if (isset($_POST['nome'])) {
        $where .= " and pessoa.nome like '%". $_POST['nome'] ."%' ";
    }
    if (isset($_POST['dataRecebimento'])) {
        $where .= " and dataRecebimento like '%". $_POST['dataRecebimento'] ."%' ";
    }
    if (isset($_POST['mesReferencia'])) {
        $where .= " and mesReferencia like '%". $_POST['mesReferencia'] ."%' ";
    }
    if (isset($_POST['status'])) {
        $where .= " and mensalidade.status like '%". $_POST['status'] ."%' ";
    }

    

    $sql = "select mensalidade.id, mensalidade.valor, mensalidade.mesReferencia, mensalidade.dataRecebimento, mensalidade.status, mensalidade.idmatricula, pessoa.nome as pessoa_nome
        from mensalidade
        inner join matricula on matricula.id = mensalidade.idmatricula
        inner join pessoa on pessoa.id = matricula.idpessoa
        inner join turma on turma.id = matricula.idturma
        inner join curso on curso.id = turma.idcurso
        where 1 = 1 " . 
        $where;


    //Executa SQL
    $resultado = mysqli_query($conexao, $sql);
    $total = mysqli_num_rows($resultado);
    $somaRecebimento = "select sum(valor) as qt_recebido from mensalidade where status='1'"; //Pega a sql para contagem de recebimento
    $resultadoSomaRecebimento = mysqli_query($conexao, $somaRecebimento); //transforma string $somaRecebimento em numero
    $numSomaRecebimento = mysqli_fetch_array($resultadoSomaRecebimento);  //transforma o resultado em um retorno 
}
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
            <div class="text-center border border-white rounded"><h3 class="pt-3">Mensalidades cadastradas no sistema</h3>
             </div><br><br><br><br>
        </div>  
        
        <p><form method="post" action="<?php echo  $_SERVER['PHP_SELF'];?>" >
        <div class="form-row">
                    <div class="col-lg-5 col-md-6 col-sm-12">
                  <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Informe o nome do aluno...">
            </div> 
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                <label for="dataRecebimento">Data Recebimento</label>
                <input type="date" name="dataRecebimento" id="dataRecebimento" class="form-control">
            </div> 
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                <div class="form-group">
                <label for="mesReferencia">Mês de Referência</label>
                <select name="mesReferencia" class="form-control">
    <option value="">Selecione</option>
    <option value="1">Janeiro</option>
    <option value="2">Fevereiro</option>
    <option value="3">Março</option>
    <option value="4">Abril</option>
    <option value="5">Maio</option>
    <option value="6">Junho</option>
    <option value="7">Julho</option>
    <option value="8">Agosto</option>
    <option value="9">Setembro</option>
    <option value="10">Outubro</option>
    <option value="11">Novembro</option>
    <option value="12">Dezembro</option>
</select>
            </div>          
                </div>

                <div class="col-lg-2 col-md-6 col-sm-12">
                  <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
    <option value="1">Ativo</option>
    <option value="0">Inativo</option>
</select>
            </div> 
                </div>
                </div>

            
            
                       <br> <div class="text-center">
                       <div class="text-center"> <!-- div alinhamento de botões à direita -->
                            <button type="submit" class="btn btn-secondary" name="limpar" value="limpar">Limpar</button>
          <button type="submit" class="btn btn-info" name="pesquisar" value="pesquisar">Pesquisar</button></div>
                            </div> <!-- div alinhamento de botões à direita --><br><br>
                            

</form></p>

<?php if (isset($_POST['pesquisar'])) { ?>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Mês Referência</th>
                        <th scope="col">Data Recebimento</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>

                <tbody style= "color: white">
                
                    <?php 
                    if(mysqli_num_rows($resultado) > 0){
                        while($linhas = mysqli_fetch_assoc($resultado)){ ?>
                      <?php $linhas['id']; $id = $linhas['id'] ?> 
                            <tr>
                                <td>  <?php echo $linhas['pessoa_nome']?>  </td>
                                <td>  <?php echo 'R$'; echo $linhas['valor']; echo ',00'?>  </td>
                                <td>  <?php echo converteMes($linhas['mesReferencia'], 1)?>  </td>
                                <td>  <?php echo converteData($linhas['dataRecebimento'])?>  </td>
                                <td>  <?php if($linhas['status'] == 1){echo "Ativo";}else{echo "Inativo";}?>  </td>

                                <td>
                                <?php 
                                    $linkAlterar = "<a class='btn btn-primary btn-sm btn-block' href='alterarMensalidade.php?id={$id}'>Alterar</a>";
                                    echo "{$linkAlterar}";
                                
                                    $linkExcluir = "<a class='btn btn-danger btn-sm btn-block' href='excluirMensalidade.php?id={$id}'  onclick='solicitaExclusao()'>Excluir</a>"; 
                                    echo "{$linkExcluir}";
                                ?>
                                </td>
                            </tr>
                          
                    <?php }} else {echo "Nenhum registro encontrado";}  ?>
    
                </tbody>
            </table>
            <div class="border border-light">
                            <div class="card-body text-center" style="background-color:rgba(0, 0, 0, 0.40)">
                                <h4 class="card-title m-b-5">Mensalidade total recebida</h4><br>
                                <h3 class="font-light">R$<?php echo $numSomaRecebimento['qt_recebido'] ?>,00</h3>

                            </div>
                        </div>
        </div>
    </div>

<?php } ?>



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