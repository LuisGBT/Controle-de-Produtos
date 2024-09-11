<style>
   article{
     display: none !important;
   }
   
   .img2{
     width: 90% !important;
   }
   
   .img1{
     display: none !important;
   }

   #btn_cadastrar{
        width: 200px;
        position: relative;
        bottom: 5px;
        left: 25%;
    }

    form{
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
      border-radius: 20px;
    }

    form:hover{
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3), 0 10px 30px rgba(0, 0, 0, 0.25);
    }

</style>
     <div class="container">
     <div class="row">
     <div class="col-12 col-md-6">
     <form class="container" action="/Projects/src/crud.php" method="POST">
  <input type="hidden" name="acao" value="cadastrar">
    <h2 class="text-center">Cadastrar Produtos</h2>

      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome"  required>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Codigo de barra</label>
        <input type="number" class="form-control" name="cod_barra"  required>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Quantidade</label>
        <input type="number" class="form-control" name="quantidade">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Marca</label>
        <input type="text" class="form-control" name="marca">
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Fornecedor</label>
        <input type="text" class="form-control" name="fornecedor">
      </div>
      
      <button type="submit" id="btn_cadastrar" class=" btn btn-outline-primary" name="btn-cadastrar">Cadastrar</button>  
      </form>   

     </div>  
     <div class="col-6">
      <img class="img2 d-none d-md-block" src="../img/img2.png">
     </div>
     </div>
     </div>
     
      
<script>
  function alert() {
    Swal.fire({
      title: 'Error!',
      text: 'Do you want to continue',
      icon: 'error',
      confirmButtonText: 'Cool'
})
  }
</script>

