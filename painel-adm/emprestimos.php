<?php
require_once('verificar-permissao.php');
require_once('../conexao.php');


$pag = 'emprestimos';


?>
<div class="container">
    <a href=" index.php?pagina=<?php echo $pag ?>&funcao=novo" type="button" class="btn btn-dark m-3">NOVO
        EMPRESTIMO</a>
    <div style="margin-right:55px">
        <table id="example" class="table table-hover my-9 " style="width:100%">
            <?php
$query = $pdo->query("SELECT * FROM emprestimo ORDER BY id DESC ");
$res = $query -> fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if ($total_reg >0){?>
            <thead>
                <tr>
                    <th>Responsavel</th>
                    <th>Item</th>
                    <th>Telefone</th>
                    <th>Secretaria</th>
                    <th>Departamento</th>
                    <th>Data-saida</th>
                    <th>Data-devolução</th>
                    <th>Recebido</th>
                    <th>Situação</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                for ($i=0; $i < $total_reg; $i++){
                    foreach ($res[$i] as $key => $value){

                    }
                
            ?>
                <tr>
                    <td><?php echo $res[$i]['responsavel']?></td>
                    <td><?php echo $res[$i]['item']?></td>
                    <td><?php echo $res[$i]['telefone']?></td>
                    <td><?php echo $res[$i]['secretaria']?></td>
                    <td><?php echo $res[$i]['departamento']?></td>
                    <td><?php echo $res[$i]['saida']?></td>
                    <td><?php echo $res[$i]['devolucao']?></td>
                    <td><?php echo $res[$i]['recebido']?></td>
                    <td><i class="<?php echo $res[$i]['situacao'] .$res[$i]['situacao2']?>"></i></td>
                    <!--aq fizemos a concatenação da situação com situação2  -->
                    <td>
                        <a href="index.php?pagina=<?php echo $pag?>&funcao=devolver&id=<?php echo $res[$i]['id']?>&item=<?php echo $res[$i]['item']?>"
                            title="Devolver item">
                            <i class="bi bi-calendar-check"></i></a>

                        <a href="index.php?pagina=<?php echo $pag?>&funcao=excluir&id=<?php echo $res[$i]['id']?>"
                            title="Excluir Registro">
                            <i class="bi bi-x-lg text-danger"></i></a>






                    </td>


                </tr>
                <?php } ?>

            </tbody>
        </table>
        <?php } else{
            echo '<p>NÃO EXISTE DADOS PARA SER EXIBIDOS!</p>';



}?>
    </div>
    <div class="modal fase" tabindex="-1" id="modalExcluir">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="emprestimos/excluir.php">
                    <div class="modal-body">
                        <p>Deseja realmente excluir esse emprestimo?</p>
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


<?php
if(@$_GET['funcao'] == "editar"){
    $titulo_modal = 'Editar Registro';
    $query = $pdo->query("SELECT * FROM usuarios WHERE id ='$_GET[id]'");
    $res = $query -> fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res);
    if($total_reg >0){
        $responsavel = $res[0]['responsavel'];
        $saida = $res[0]['saida'];
        $item = $res[0]['item'];
        $telefone = $res[0]['telefone'];
        $departamento = $res[0]['departamento'];
        $devolucao=$res[0]['devolucao']; 

    }   

} else {
    $titulo_modal = "Inserir Registro";
}
?>
<div class="modal fase" tabindex="-1" id="modalCadastrar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrando</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="emprestimos/inserir.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Responsavel</label>
                                <input type="text" class="form-control" id="responsavel" name="responsavel"
                                    placeholder="Responsavel" required="" value="<?php echo @$responsavel?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Item</label>
                                <input type="text" class="form-control" id="item" name="item" placeholder="Item"
                                    required="" value="<?php echo @$item?>">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone"
                            required="" value="<?php echo @$telefone?>">
                    </div>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        
                        <label for="exampleFormControlInput1" class="form-label">Secretaria</label>
                        <select class="form-select mt-1" aria-label="Default select example" name="secretaria"
                            id="secretaria" required="" value="<?php echo @$secretaria ?>" >
                            <option disabled <?php if(@$secretaria == ''){ ?> selected <?php } ?> value="">Escolha a secretaria
                            </option> 

                            <option <?php if(@$secretaria == 'GP'){ ?> selected <?php } ?> value="GP">GP - Gabinete do
                                Prefeito
                            </option>

                            <option <?php if(@$secretaria == 'SAS'){ ?> selected <?php } ?> value="SAS">SAS -
                                Assistência Social</option>

                            <option <?php if(@$secretaria == 'SDE'){ ?> selected <?php } ?> value="SDE">SDE -
                                Desenvolvimento Econômico
                            </option>

                            <option <?php if(@$secretaria == 'SDS'){ ?> selected <?php } ?> value="SDS">SDS - Secretaria
                                e Defesa (CGM)
                            </option>

                            <option <?php if(@$secretaria == 'SEC'){ ?> selected <?php } ?> value="SEC">SEC - Cultura
                            </option>

                            <option <?php if(@$secretaria == 'SECOM'){ ?> selected <?php } ?> value="SECOM">SECOM -
                                Comunicação
                            </option>

                            <option <?php if(@$secretaria == 'SEDUC'){ ?> selected <?php } ?> value="SEDUC">SEDUC -
                                Educação
                            </option>

                            <option <?php if(@$secretaria == 'SEFAZ'){ ?> selected <?php } ?> value="SEFAZ">SEFAZ -
                                Fazenda
                            </option>

                            <option <?php if(@$secretaria == 'SEHAB'){ ?> selected <?php } ?> value="SEHAB">SEHAB -
                                Habilitação
                            </option>

                            <option <?php if(@$secretaria == 'SEMA'){ ?> selected <?php } ?> value="SEMA">SEMA -
                                Manutenção
                            </option>

                            <option <?php if(@$secretaria == 'SEMEL'){ ?> selected <?php } ?> value="SEMEL">SEMEL -
                                Esporte e Lazer
                            </option>

                            <option <?php if(@$secretaria == 'SEPLAN'){ ?> selected <?php } ?> value="SEPLAN">SEPLAN -
                                Planejamento
                            </option>

                            <option <?php if(@$secretaria == 'SETRAM'){ ?> selected <?php } ?> value="SETRAM">SETRAM -
                                Transporte
                            </option>

                            <option <?php if(@$secretaria == 'SGP'){ ?> selected <?php } ?> value="SGP">SGP - Gestão de
                                Pessoas
                            </option>

                            <option <?php if(@$secretaria == 'SJ'){ ?> selected <?php } ?> value="SJ">SJ - Jurídico
                            </option>

                            <option <?php if(@$secretaria == 'SMA'){ ?> selected <?php } ?> value="SMA">SMA -
                                Administração
                            </option>

                            <option <?php if(@$secretaria == 'SMG'){ ?> selected <?php } ?> value="SMG">SMG - Governo
                            </option>

                            <option <?php if(@$secretaria == 'SMO'){ ?> selected <?php } ?> value="SMO">SMO - Obras
                            </option>

                            <option <?php if(@$secretaria == 'SMS'){ ?> selected <?php } ?> value="SMS">SMS - Saúde
                            </option>

                        </select>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Departamento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento"
                            placeholder="Departamento" required="" value="<?php echo @$departamento?>">
                    </div>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Saida</label>
                        <input type="date" class="form-control" id="saida" name="saida" required=""
                            value="<?php echo @$saida?>">
                    </div>


                </div>

                <!-- <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Devolucao</label>
                        <input type="date" class="form-control" id="devolucao" name="devolucao"
                            value="<?php echo @$devolucao?>">
                    </div>
                </div> -->

                <div align="center" id="msg">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btn-fechar"
                        data-bs-dismiss="modal">Fechar</button>
                    <button name="salvar" type="submit" class="btn btn-primary">Salvar</button>

                    <input name="id" type="hidden" value="<?php echo @$_GET['id']?>">

                </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>

<!-- modal devolução -->
</style>
<div class="modal" tabindex="-1" id='Devolucao'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Devolução</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <form action="devolver.php" method="POST">
                    <p>Tem certeza que vai devolver o <?php echo $_GET['item']?>?</p>
                    <input type="date" name="devolucao" required=''>
            </div>
            <div class="modal-body text-center">
                <form action="devolver.php" method="POST">
                    <p>Quem recebeu?</p>
                    <input type="text" name="recebido" required=''>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Devolver</button>
                <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
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
if(@$_GET['funcao'] == "excluir"){ ?>
<script type="text/javascript">
var myModal = new bootstrap.Modal(document.getElementById('modalExcluir'), {

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

if(@$_GET['funcao'] == "devolver"){ ?>
<script type="text/javascript">
var myModal = new bootstrap.Modal(document.getElementById('Devolucao'), {
    backdrop: 'static'
});
myModal.show();
</script>
<?php } ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        "ordering": false
    });
});
</script>