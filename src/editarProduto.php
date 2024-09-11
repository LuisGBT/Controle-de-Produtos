<style>
    article {
        display: none !important;
    }

    .img2 {
        display: none !important;
    }

    .img1 {
        display: none !important;
    }
    .col-5{
        position: relative;
        left: 29%;
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
        padding: 5px;
        background-color: #fcffff;
    }

    .col-5:hover{
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3), 0 10px 30px rgba(0, 0, 0, 0.25);
    }

    #btn_editar{
        width: 200px;
        position: relative;
        bottom: 5px;
        left: 25%;
    }
</style>
<?php
$sql = "SELECT * FROM produtos WHERE id=" . $_REQUEST['id'];
$result = $conn->query($sql);
$row = $result->fetch_object(); 

?>
<div class="container " style="background-color: #ffff;">
    <div class="row ">
        <div class="col-5">
            <form class="container" action="/Projects/src/crud.php" method="POST">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id" value="<?php echo $row->id ?>">
                <h2 class="text-center">Alterar Quantidade</h2>

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" value="<?php echo $row->nome ?>" name="nome" disabled>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Codigo de barra</label>
                    <input type="number" class="form-control" value="<?php echo $row->cod_barra ?>" name="cod_barra"
                        disabled>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Quantidade Atual</label>
                    <input type="number" class="form-control" value="<?php print $row->quantidade?>" name="addQtd" disabled>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Adicionar Quantidade</label>
                    <input type="number" class="form-control" value="" name="addQtd">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Retirar Quantidade</label>
                    <input type="text" class="form-control" name="retirarQtd">
                </div>
                <button type="submit" id="btn_editar" class="btn btn-outline-success" name="btn-cadastrar">Editar</button>
            </form>

        </div>
        <div class="col-6">
            <img class="img2 d-none d-md-block" src="../img/img2.png">
        </div>
    </div>
</div>