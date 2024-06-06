<?php
require_once("../../conexao.php");

$nome = $_POST['nome'];
$email =$_POST["email"];
$senha =$_POST["senha"];
$funcao =$_POST["funcao"];
$nivel =$_POST["nivel"]; //forms --> variaveis criadas para o php --> banco de dados
$id = $_POST['id'];



$antigo2 = $_POST['antigo2-perfil'];

echo $antigo2;
if ( $antigo2 != $email){
        $query = $pdo->query("SELECT * FROM usuarios WHERE email ='$email'");
$res = $query -> fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg >0){

        echo "<script language='javascript'>window.alert('Email ja cadastrado')</script>";
        echo "<script language='javascript'>window.location='../index.php?pagina=usuarios'</script>";
        exit();
}

}   



if ($id ==''){
$res = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, funcao = :funcao, nivel = :nivel, senha = :senha "); // usar 'prepare' pra formulario --> BAnco de dados
        // : parametros (apelido)
$res->bindValue(":nome",$nome); // bindValue --> receber variavel e valor diretos
$res->bindValue(":email",$email);
$res->bindValue(":senha", hash("sha512",$senha));
$res->bindValue(":nivel",$nivel);
$res->bindValue(":funcao",$funcao);
$res->execute(); // --> conexão das variaves ao banco

echo "<script language='javascript'>window.location='../index.php?pagina=usuarios'</script>";

}  else {
$res = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, funcao = :funcao, nivel = :nivel, senha = :senha  WHERE id = :id"); // usar 'prepare' pra formulario --> BAnco de dados
$res->bindValue(":nome",$nome); // bindValue --> receber variavel e valor diretos
$res->bindValue(":email",$email);
$res->bindValue(":senha", hash("sha512",$senha));
$res->bindValue(":nivel",$nivel);
$res->bindValue(":funcao",$funcao); 
$res->bindValue(":id",$id);



$res->execute(); // --> conexão das variaves ao banco
echo "<script language='javascript'>window.location='../index.php?pagina=usuarios'</script>";
}
?>