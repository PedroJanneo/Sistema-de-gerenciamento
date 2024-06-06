<?php
require_once("../conexao.php");

$nome = $_POST['nome-perfil'];
$email = $_POST['email-perfil'];
$nivel = $_POST['nivel'];
$funcao = $_POST['funcao'];
$id = $_POST['id-perfil'];
$senha = $_POST['senha-perfil'];





$res = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, funcao = :funcao, nivel = :nivel, senha = :senha  WHERE id = :id"); // usar 'prepare' pra formulario --> BAnco de dados
$res->bindValue(":nome", $nome); // bindValue --> receber variavel e valor diretos
$res->bindValue(":email", $email);
$res->bindValue(":senha", hash("sha512", $senha));
$res->bindValue(":nivel", $nivel);
$res->bindValue(":funcao", $funcao);
$res->bindValue(":id", $id);
$res->execute(); // --> conexão das variaves ao banco

echo "<script language='javascript'>window.location='index.php?pagina=usuarios'</script>";
