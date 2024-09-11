<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      background-color: #fcffff;
    }

    section {
      background-color: #F5FFFA;
      border: none;
      height: auto;
      border-radius: 1%;
      margin-top: 70px;
    }
    nav {
      height: 45px;
    }
    @media screen and (max-width: 768px) {
      nav {
        height: auto;
      }
    }
  </style>
</head>
<nav class="navbar navbar-expand-md navbar-dark bg-dark  fixed-top">
  <div class="container">

    <!--Icone De Usuario -->
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <lord-icon src="https://cdn.lordicon.com/xzalkbkz.json" trigger="loop" delay="2000"
      colors="primary:#ffffff,secondary:#1663c7" style="width:48px;height:48px">
    </lord-icon>

    <!--Icone Dropdown -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--Barra de navegação -->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav d-flex justify-content-around " style="width: 100%;">
        <a class="nav-link" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="?page=paginaCadastro">Cadastrar</a>
        <a class="nav-link" href="?acao=listar">Listar</a>

        <!--Input de pesquisa -->
        <form class="d-flex">
          <input class="form-control me-2 mt-1 " name="busca" type="search" placeholder="Search" aria-label="Search"
            style="max-height:33px;">
          <button class="btn btn-outline-primary mt-1" type="submit" style="max-height:33px;" name="acao"
            value="pesquisa">
            <p>Pesquisar</p>
          </button>
        </form>

      </div>
    </div>
  </div>
</nav>

<section class="container">
  <div class="row">

    <!--Conteudo do index -->
    <article class="col-12 col-md-6">
      <h1 class="p-3">Controle de produtos</h1>
      <p class="p-3" style="p{text-indent: 20px !important;}">
        Bem-vindo ao nosso Sistema de Gerenciamento de Produtos Vencidos e Avariados! Este sistema foi desenvolvido para
        otimizar e simplificar o processo de cadastro, monitoramento e troca de produtos que estão fora do prazo de
        validade ou que sofreram avarias.
      </p>
      <p class="p-3">
        Nosso sistema tem como objetivo principal fornecer uma plataforma eficiente para o registro e a gestão de
        produtos que não podem mais ser vendidos ou utilizados em seu estado atual. Através de uma interface intuitiva e
        de fácil navegação, você poderá cadastrar novos produtos vencidos ou avariados, realizar a edição e a exclusão
        de registros existentes, e acompanhar o status das trocas de forma clara e organizada.
      </p>
    </article>

    <?php
    # Incluindo a conexão e o crud   
    require '/xampp/htdocs/Projects/Conexao/config.php';
    require '/xampp/htdocs/Projects/src/crud.php';

    switch (@$_REQUEST["page"]) {
      case 'paginaCadastro':
        require_once 'paginaCadastro.php';
        break;
      case 'index':
        require_once 'index.php';
        break;
      case 'editar':
        require_once 'editarProduto.php';
      default:
        break;
    }
    ?>
    <aside class="col-6">
      <img class="img1 d-none d-md-block" src="../img/img1.png" style="width: 90%">
    </aside>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
  integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>