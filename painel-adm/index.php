<?php
@session_start();// usar o ../ quando for algo do diretório anterior
require_once('../conexao.php');
require_once('verificar-permissao.php');


// variáveis
$menu1 = 'home';
$menu2 = 'usuarios';
$menu3 = 'emprestimos';




// recuperar dados
$query = $pdo->query("SELECT * FROM usuarios WHERE id = '$_SESSION[id_usuario]'");
$res = $query -> fetchAll(PDO::FETCH_ASSOC);
$nome_usu = $res[0]['nome'];
$email_usu = $res[0]['email'];
$senha_usu = $res[0]['senha'];
$nivel_usu = $res[0]['nivel'];
$funcao_usu = $res[0]['funcao'];
$id_usu = $res[0]['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de emprestimo</title>
        <link rel="icon" type="image/png" href="vendor/login/images/icons/favicon.ico" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="../vendor/DataTables/datatables.min.css" rel="stylesheet">

    <script src="../vendor/DataTables/datatables.min.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



</head>
<body>
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active bg-secondary text-light mx-3
                        " aria-current="page" href="index.php?pagina=<?php echo $menu1 ?>">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link bg-secondary text-light mx-3
                     " href="index.php?pagina=<?php echo $menu2 ?>">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-secondary text-light mx-3
                        " href="index.php?pagina=<?php echo $menu3 ?>">Emprestimos</a>
                    </li>
                </ul>
                <div class="d-flex ml-2">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <span class='text-light'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </span>
                    <div class="collapse navbar-collapse px-5 bg-secondary rounded ">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown ">
                                <button class="btn dropdown-toggle text-light" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <?php echo $nome_usu?>
                                </button>

                                <ul class="dropdown-menu dropdown-menu bg-secondary ">
                                    <!-- <li><a class="dropdown-item text-light" href="editar-perfil.php"
                                            data-bs-toggle='modal' data-bs-target="#modalPerfil">Editar perfil</a></li>
                                    <li>
                                        <hr class="dropdown-divider"> -->
                                        <!--aquele divisor das opções-->
                                    </li>
                                    <li><a class="dropdown-item text-light" href="../logout.php">Sair</a></li>
                                </ul>
                            </li>
                        </ul>

                        </li>
                        </ul>
                    </div>
                </div>
    </nav>

    <div class="container-fluid mt-2">
        <?php
	 	if (@$_GET['pagina'] == $menu1){ 
			require_once($menu1.'.php'); 
		} else if(@$_GET['pagina'] == $menu2){
			require_once($menu2.'.php');
        } else if(@$_GET['pagina'] == $menu3){
			require_once($menu3.'.php');
		} else {
			require_once($menu1.'.php');
		}
	 	?>



</body>
<style>
.navbar-brand {
    display: flex;
    justify-content: center;
    width: 100%;
}
</style>

<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-secondary ">
    <div class="container-fluid ">
        <a class="navbar-brand " href="index.php?pagina=<?php echo $menu1 ?>">Copyright ₢ 2024 All Rights Reserved</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </div>
</nav>

</html>

<!-- <div class="modal fase" tabindex="-1" id="modalPerfil">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="form-perfil">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome-perfil" name="nome-perfil"
                                    placeholder="Nome" required="" value="<?php echo $nome_usu?>">

                            </div>
                        </div>


                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha-perfil" name="senha-perfil"
                                    placeholder="Senha" required="" value="<?php echo @$senha_usu ?>">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email-perfil" name="email-perfil"
                            placeholder="Email" required="" value="<?php echo @$email_usu ?>">
                    </div>
                </div>


                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nivel" class="form-label"></label>
                        <input type="hidden" class="form-control" id="nivel" name="nivel" placeholder="nivel"
                            value="<?php echo @$nivel_usu ?>">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="funcao" class="form-label"></label>
                        <input type="hidden" class="form-control" id="funcao" name="funcao" placeholder="funcao"
                            value="<?php echo @$funcao_usu ?>">
                    </div>
                </div>

        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn-fechar" data-bs-dismiss="modal">Fechar</button>
        <button name="id-btn-perfil" id="btn-salvar-perfil" type="submit" class="btn btn-primary">Salvar</button>
        <input name="id-perfil" type="hidden" value="<?php echo @$id_usu?>">
        <input name="nome-perfil" type="hidden" value="<?php echo @$nome_usu?>">
        <input name="email-antigo" type="hidden" value="<?php echo @$email_usu?>">
        <input name="senha-antigo" type="hidden" value="<?php echo @$senha_usu?>">
    </div>
</div>
</form> -->






<!--AJAX PARA EDIÇÃO PERFIL -->
<script type="text/javascript">
$("#form-perfil").submit(function() {
    //variavel php
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "editar-perfil.php",
        type: 'POST',
        data: formData,

        success: function(msg) {

            $('#msg').removeClass()

            if (msg.trim() == "Salvo com Sucesso!") {

                //$('#nome').val('');
                //$('#cpf').val('');
                $('#btn-fechar').click();
                // window.location = "index.php?pagina=" +
                //     pag;

            } else {

                $('#msg-perfil').addClass('text-danger')
            }

            $('#msg-perfil').text(msg)

        },

        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }
    });
});
</script>