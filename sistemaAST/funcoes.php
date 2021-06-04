<?php

function converteData($data){
    return date("d/m/Y", strtotime($data));
}
function converteMes($mesReferencia){
    $meses = array("Janeiro", "Fevereiro", "Março" , "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
    return $meses[$mesReferencia - 1];
}

function listaSalas($numeroSala){
    $sala = array("Violao", "Guitarra", "Baixo" , "Violino", "Bateria", "Ukulele");
    return $sala[$numeroSala - 1];
}

function mostraTurma($idturma){
    $turma = array("Violão Segunda 14:00", "Violão Segunda 18:00", "Violão Terça 14:00" , "Violão Terça 18:00", "Violão Quarta 14:00", "Violão Quarta 18:00", "Violão Quinta 14:00","Violão Quinta 18:00", "Violão Sexta 14:00","Violão Sexta 18:00",
                   "Guitarra Segunda 15:00","Guitarra Segunda 19:00","Guitarra Terça 15:00","Guitarra Terça 19:00","Guitarra Quarta 15:00","Guitarra Quarta 19:00","Guitarra Quinta 15:00","Guitarra Quinta 19:00","Guitarra Sexta 15:00","Guitarra Sexta 19:00",
                   "Baixo Segunda 16:00","Baixo Segunda 20:00","Baixo Terça 16:00","Baixo Terça 20:00","Baixo Quarta 16:00","Baixo Quarta 20:00","Baixo Quinta 16:00","Baixo Quinta 20:00","Baixo Sexta 16:00","Baixo Sexta 20:00",
                   "Violino Segunda 13:30","Violino Segunda 18:30","Violino Terça 13:30","Violino Terça 18:30","Violino Quarta 13:30","Violino Quarta 18:30","Violino Quinta 13:30","Violino Quinta 18:30","Violino Sexta 13:30","Violino Sexta 18:30",
                   "Bateria Segunda 15:30","Bateria Segunda 19:30","Bateria Terça 15:30","Bateria Terça 19:30","Bateria Quarta 15:30","Bateria Quarta 19:30","Bateria Quinta 15:30","Bateria Quinta 19:30","Bateria Sexta 15:30","Bateria Sexta 19:30",
                   "Ukulele Segunda 14:30","Ukulele Segunda 19:30","Ukulele Terça 14:30","Ukulele Terça 19:30","Ukulele Quarta 14:30","Ukulele Quarta 19:30","Ukulele Quinta 14:30","Ukulele Quinta 19:30","Ukulele Sexta 14:30","Ukulele Sexta 19:30");
    return $turma[$idturma - 1];
}



function getComboboxSala($idParam) {
    require("conexao.php");
    $sql = "select * from sala order by numeroSala";

    $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
    $option = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $numeroSala = $linha['numeroSala'];

        $sel = ($id == $idParam) ? "selected" : "";
        $option .= "<option value={$id} {$sel}>{$numeroSala}</option>";
    }

    return $option;
}

function getComboboxTurma() {
    require("conexao.php");
    $sql = "select * from turma order by id";

    $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
    $option = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        //$idcurso = $linha['idcurso'];
        $option .= "<option value={$id}>{$id}</option>";
    }

    return $option;
}

function getComboboxSala1() {
    require("conexao.php");
    $sql = "select * from sala order by numeroSala";

    $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
    $option = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $numeroSala = $linha['numeroSala'];
        $option .= "<option value={$id}>{$numeroSala}</option>";
    }

    return $option;
}

function getComboboxPessoa() {
    require("conexao.php");
    $sql = "select * from pessoa order by nome";

    $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
    $option = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $nome = $linha['nome'];
        $option .= "<option value={$id}>{$nome}</option>";
    }

    return $option;
}

 function getComboboxMatricula() {
     require("conexao.php");
     $sql = "select matricula.id, pessoa.nome 
                from matricula 
            inner join pessoa on pessoa.id = matricula.idpessoa
            order by pessoa.nome and tipoPessoa = 'AL'";

     $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
     $option = "";
     while ($linha = mysqli_fetch_assoc($resultado)) {
         $id = $linha['id'];
         $nome = $linha['nome'];
         //$idpessoa = $linha['idpessoa'];
         $option .= "<option value='{$id}'>{$nome} - {$id}</option>";
     }

     return $option;
 }

function getComboboxCurso($idParam) {
    require("conexao.php");
    $sql = "select * from curso order by nome";

    $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
    $option = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $nome = $linha['nome'];

        $sel = ($id == $idParam) ? "selected" : "";
        $option .= "<option value={$id} {$sel}>{$nome}</option>";
    }

    return $option;
}


function getComboboxCurso1() {
    require("conexao.php");
    $sql = "select * from curso order by nome";

    $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
    $option = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $nome = $linha['nome'];
        $option .= "<option value={$id}>{$nome}</option>";
    }

    return $option;
}

function getComboboxPessoa1($idParam) {
    require("conexao.php");
    $sql = "select * from pessoa order by nome";

    $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
    $option = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $nome = $linha['nome'];

        $sel = ($id == $idParam) ? "selected" : "";
        $option .= "<option value={$id} {$sel}>{$nome}</option>";
    }

    return $option;
}

function getComboboxTurma1($idParam) {
    require("conexao.php");
    $sql = "select * from turma order by id";

    $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
    $option = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        //$idcurso = $linha['idcurso'];

        $sel = ($id == $idParam) ? "selected" : "";
        $option .= "<option value={$id} {$sel}>{$id}</option>";
    }

    return $option;
}

function getComboboxMatricula1($idParam) {
    require("conexao.php");
    $sql = "select * from matricula order by id";

    $resultado = mysqli_query($conexao, $sql) or die("Erro no SQL");
    $option = "";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        //$idpessoa = $linha['idpessoa'];

        $sel = ($id == $idParam) ? "selected" : "";
        $option .= "<option value={$id} {$sel}>{$id}</option>";
    }

    return $option;
}