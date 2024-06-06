<?php

require_once("../../conexao.php");
$id = $_POST['id'];
$query_cons = $pdo->query("DELETE FROM usuarios WHERE id = '$id'");

echo "<script language='javascript'>window.location='../index.php?pagina=usuarios'</script>";
   
?>