<?php
$pag = 'usuarios';
@session_start();
require_once('../conexao.php');
require_once('verificar-permissao.php');
?>

<div class="container">

    <a href=" index.php?pagina=<?php echo $pag ?>&funcao=novo" type="button" class="btn btn-dark m-3">NOVO USUARIO</a>
    <div style="margin-right:55px">
        <table id="example" class="table table-hover my-9 " style="width:100%">
            <?php
$query = $pdo->query("SELECT * FROM usuarios ORDER BY id DESC ");
$res = $query -> fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if ($total_reg >0){?>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Função</th>
                    <th>Nivel</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                for ($i=0; $i < $total_reg; $i++){
                    foreach ($res[$i] as $key => $value){

                    }
                
            ?>
                <tr>
                    <td> <?php echo $res[$i]['nome'] ?></td>
                    <td><?php echo $res[$i]['email']?></td>
                    <!-- <td><?php echo $res[$i]['senha']?></td> ocultar a senha -->
                    <td><?php echo $res[$i]['funcao']?></td>
                    <td><?php echo $res[$i]['nivel']?></td>
                    <td>
                        <a href="index.php?pagina=<?php echo $pag?>&funcao=editar&id=<?php echo $res[$i]['id']?>"
                            title="Editar Registro">
                            <i class="bi bi-pencil-square text-primary"></i>
                        </a>
                        <a href="index.php?pagina=<?php echo $pag?>&funcao=excluir&id=<?php echo $res[$i]['id']?>"
                            title="Excluir Registro">
                            <i class="bi bi-x-lg text-danger"></i>
                    </td>


                </tr>
                <?php } ?>

            </tbody>
        </table>
        <?php } else{
            echo '<p>NÃO EXISTE DADOS PARA SER EXIBIDOS!</p>';



}?>
    </div>

    <?php
if(@$_GET['funcao'] == "editar"){
    $titulo_modal = 'Editar Registro';
    $query = $pdo->query("SELECT * FROM usuarios WHERE id ='$_GET[id]'");
    $res = $query -> fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res);
    if($total_reg >0){
        $nome = $res[0]['nome'];
        $email = $res[0]['email'];
        $senha = $res[0]['senha'];
        $funcao = $res[0]['funcao'];
        $nivel = $res[0]['nivel']; 

    }   
} else {
    $titulo_modal = "Inserir Registro";
}
?>

    <div class="modal fase" tabindex="-1" id="modalCadastrar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $titulo_modal?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="usuarios/inserir.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
                                        required="" value="<?php echo @$nome?>">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"
                                        required="" value="<?php echo @$senha?>">
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                required="" value="<?php echo @$email ?>">
                        </div>


                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Funcao</label>
                            <input type="text" class="form-control" id="funcao" name="funcao" placeholder="Funcao"
                                required="" value="<?php echo @$funcao ?>">
                        </div>
                    </div> 

                   <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nivel</label>
                            <select class="form-select mt-1" aria-label="Default select example" name="nivel" id="nivel"
                                value="<?php echo @$nivel ?>">
                                <option <?php if(@$nivel == 'Administrador'){ ?> selected <?php } ?>
                                    value="Administrador">
                                    Administrador</option>

                            </select>
                        </div>

                    </div>


                    <div align="center" id="msg">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btn-fechar"
                            data-bs-dismiss="modal">Fechar</button>
                        <button name="salvar" id="btn-salvar" type="submit" class="btn btn-primary">Salvar</button>
                        <input name="id" type="hidden" value="<?php echo @$_GET['id']?>">

                        <input name="email-antigo" type="hidden" value="<?php echo @$email?>">

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fase" tabindex="-1" id="modalExcluir">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $titulo_modal?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="usuarios/excluir.php">
                    <div class="modal-body">
                        <p>Deseja realmente excluir?</p>

                    </div>
                    <div align="center" id="msg-excluir">

                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btn-fechar"
                            data-bs-dismiss="modal">Fechar</button>
                        <button name="excluir" id="btn-excluir" type="submit" class="btn btn-danger">Excluir</button>


                    </div>

                    <input name="id" type="hidden" value="<?php echo @$_GET['id']?>">

            </div>
            </form>
        </div>
    </div>
</div>
</div>



<?php 
if(@$_GET['funcao'] == "novo"){ ?>
<script type="text/javascript">
var myModal = new bootstrap.Modal(document.getElementById('modalCadastrar'), {
    backdrop: 'static'
});
myModal.show();
</script>
<?php } ?>

<?php 
if(@$_GET['funcao'] == "editar"){ ?>
<script type="text/javascript">
var myModal = new bootstrap.Modal(document.getElementById('modalCadastrar'), {
    backdrop: 'static'
});
myModal.show();
</script>
<?php } ?>

<?php
if(@$_GET['funcao'] == "excluir"){ ?>
<script type="text/javascript">
var myModal = new bootstrap.Modal(document.getElementById('modalExcluir'), {

});
myModal.show();
</script>
<?php } ?>

<!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
$("#form").submit(function() {
    var pag = "<?=$pag?>"; //variavel php
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: pag + "/inserir.php",
        type: 'POST',
        data: formData,

        success: function(msg) {

            $('#msg').removeClass()

            if (msg.trim() == "Salvo com Sucesso!") {

                //$('#nome').val('');
                //$('#cpf').val('');
                $('#btn-fechar').click();
                window.location = "index.php?pagina=" +
                    pag;

            } else {

                $('#msg').addClass('text-danger')
            }

            $('#msg').text(msg)

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

<!--AJAX PARA EXCLUIR DADOS  -->
<script type="text/javascript">
$("#form-excluir").submit(function() {
    var pag = "<?=$pag?>"; //variavel php
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: pag + "/excluir.php",
        type: 'POST',
        data: formData,

        success: function(msg) {

            $('#msg').removeClass()

            if (msg.trim() == "Excluido com Sucesso!") {

                //$('#nome').val('');
                //$('#cpf').val('');
                $('#btn-fechar').click();
                window.location = "index.php?pagina=" +
                    pag;

            } else {

                $('#msg-excluir').addClass('text-danger')
            }

            $('#msg-excluir').text(msg)

        },
        cache: false,
        contentType: false,
        processData: false,


    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        "ordering": false
    });
});
</script>