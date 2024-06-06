<?php

require_once("../../conexao.php");
$id = $_POST['id'];
$query_cons = $pdo->query("DELETE FROM emprestimo WHERE id = '$id'");

echo "<script language='javascript'>window.location='../index.php?pagina=emprestimos'</script>";
   
?>