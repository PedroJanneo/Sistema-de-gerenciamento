<?php
require_once("conexao.php");
@session_start();


$usuario = $_POST['usuario'];

$senha = hash('sha512',$_POST['senha']);


$query_cons = $pdo->prepare("SELECT * FROM usuarios WHERE email = :usuario AND senha = :senha");
$query_cons ->bindValue(":usuario", $usuario);      // veja se email é igual usuario; senha é igual senha
$query_cons ->bindValue(":senha", $senha);               // :senha --> BANCO; $senha --> PHP
$query_cons->execute();                            
$res_cons = $query_cons -> fetchAll(PDO::FETCH_ASSOC);
echo @count($res_cons);

if (@count($res_cons) >0){
    $nivel = $res_cons[0]['nivel'];
    // nivel_acesso --> nome no banco!
    $_SESSION['nome_usuario'] = $res_cons[0]['nome'];
    $_SESSION['nivel_usuario'] = $res_cons[0]['nivel'];
    $_SESSION['funcao_usuario'] = $res_cons[0]['funcao'];
    $_SESSION['id_usuario'] = $res_cons[0]['id'];

    if($nivel == 'Administrador'){
        echo "<script language='javascript'>window.location='painel-adm'</script>";
    }
}else {
    echo "<script language='javascript'>window.alert('Dados Incorretos')</script>";
    echo "<script language='javascript'>window.location='index.php'</script>";
}





?>