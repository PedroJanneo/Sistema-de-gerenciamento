<?php
@session_start();
require_once('../conexao.php');

$id = $_POST['id'];
$devolucao = date('d-m-Y',strtotime($_POST['devolucao']));
$situacao ="bi bi-circle-fill "; 
$situacao2 = 'text-success text-center';
$recebido= $_POST['recebido'];

    echo $id;
    echo $devolucao;

    $res = $pdo->prepare("UPDATE emprestimo SET devolucao = :devolucao, situacao =:situacao, situacao2 = :situacao2, recebido = :recebido WHERE id = :id"); 
    $res->bindValue(":devolucao",$devolucao);
    $res->bindValue(":id",$id);
    $res->bindValue(":situacao",$situacao);
    $res->bindValue(":situacao2",$situacao2);
    $res->bindValue(":recebido",$recebido);
    $res->execute();
    echo "<script language='javascript'>window.location='index.php?pagina=emprestimos'</script>";

?>