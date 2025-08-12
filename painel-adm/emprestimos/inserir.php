<?php
require_once("../../conexao.php");

$responsavel = $_POST['responsavel'];
$saida = date('d-m-Y',strtotime($_POST["saida"]));
$item =$_POST["item"];
$telefone =$_POST["telefone"];
$departamento =$_POST["departamento"]; 
// $devolucao =$_POST["devolucao"]; tirei o devolucao do forms
$id = $_POST['id'];

$receido = $_POST['recebido'];
$situacao ='bi bi-circle-fill '; 
$situacao2 = 'text-warning text-center';



if ($id ==''){
$res = $pdo->prepare("INSERT INTO emprestimo SET responsavel = :responsavel, telefone = :telefone, item = :item, departamento = :departamento, saida = :saida, situacao = :situacao, situacao2 = :situacao2"); // usar 'prepare' pra formulario --> BAnco de dados
        // : parametros (apelido)
$res->bindValue(":responsavel",$responsavel); // bindValue --> receber variavel e valor diretos
$res->bindValue(":item",$item);
$res->bindValue(":telefone",$telefone);
$res->bindValue(":departamento",$departamento);
$res->bindValue(":saida",$saida);
// $res->bindValue(":devolucao",$devolucao); tirei o devolucao do forms
$res->bindValue(':situacao',$situacao);
$res->bindValue(':situacao2',$situacao2);

$res->execute(); // --> conexão das variaves ao banco

echo "<script language='javascript'>window.location='../index.php?pagina=emprestimos'</script>";

}  else {
$res = $pdo->prepare("UPDATE emprestimo SET responsavel = :responsavel, telefone = :telefone, item = :item, departamento = :departamento, saida = :saida, devolucao = :devolucao, situacao = :situacao, situacao2 = :situacao2, recebido= :recebido WHERE id = :id"); // usar 'prepare' pra formulario --> BAnco de dados
$res->bindValue(":responsavel",$responsavel); // bindValue --> receber variavel e valor diretos
$res->bindValue(":item",$item);
$res->bindValue(":telefone",$telefone);
$res->bindValue(":departamento",$departamento);
$res->bindValue(":saida",$saida);
$res->bindValue(":devolucao",$devolucao);
$res->bindValue(":id",$id);
$res->bindValue(':situacao',$situacao);
$res->bindValue(':situacao2',$situacao2);
$res->bindValue(':recebido',$recebido);
$res->execute(); // --> conexão das variaves ao banco

echo "<script language='javascript'>window.location='../index.php?pagina=emprestimos'</script>";
}

?>