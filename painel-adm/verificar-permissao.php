<?php
// verificar permissao do usuario 
@session_start();
if ( @$_SESSION['nivel_usuario'] != 'Administrador'){
    echo "<script language='javascript'>window.location='../index.php'</script>";
}

?>