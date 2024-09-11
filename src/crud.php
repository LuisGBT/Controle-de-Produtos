<html>
<?php
require '/xampp/htdocs/Projects/Conexao/config.php';
switch (@$_REQUEST["acao"]) {
  case 'cadastrar':
    $nome = $_POST['nome'];
    $cod_barra = $_POST['cod_barra'];
    $marca = $_POST['marca'];
    $fornecedor = $_POST['fornecedor'];
    $quantidade = $_POST['quantidade'];

    if (preg_match('/[^a-zA-Z0-9\s]/', $nome) || preg_match('/[^a-zA-Z0-9\s]/', $marca) || preg_match('/[^a-zA-Z0-9\s]/', $fornecedor)) {
      print "<script>alert('ERRO!! Campo string não pode conter caracteres especiais');</script>";
      print "<script> location.href='./?index.php&&page=paginaCadastro';</script>";

    }elseif (is_numeric($nome) || is_numeric($marca) || is_numeric($fornecedor)) {
      print "<script>alert('ERRO!! Campo string não pode conter numero');</script>";
      print "<script> location.href='./?index.php&&page=paginaCadastro';</script>";

    }else{
      $sql = "INSERT INTO produtos (nome, cod_barra, marca, fornecedor, quantidade)
             VALUES ('{$nome}', '{$cod_barra}', '{$marca}', '{$fornecedor}', '{$quantidade}')";  
    }

    if ($result = $conn->query($sql)) {
      print "<script> alert('Produto cadastrado com sucesso!!');</script>";

    } else {
      echo "<script> alert('ERRO!!'); </script>";
      print "<script> location.href='index.php';</script>";
    }

    break;
  case 'listar':
    $sql = "SELECT * FROM produtos";
    $result = $conn->query($sql);
    $qtd = $result->num_rows;
    if ($qtd > 0) {
      # Tag style para poder remover o conteudo da pagina index.php
      print "<style>article{display: none;} </style>";
      print "<style>.img1{display: none !important;}</style>";

      print "<table class='table text-center'>";
      print "<thead>";
      print "<tr>";
      print "<th>ID</th>";
      print "<th>Nome</th>";
      print "<th>Cod_barra</th>";
      print "<th>Marca</th>";
      print "<th>fornecedor</th>";
      print "<th>Quantidade</th>";
      print "<th>Opção</th>";
      print "</tr>";
      print "</thead>";

      while ($row = $result->fetch_object()) {
        print "<tbody>";
        print "<tr>";
        print "<th>" . $_POST['id'] = $row->id . "</td>";
        print "<td>" . $_POST['nome'] = $row->nome . "</td>";
        print "<td>" . $_POST['cod_barra'] = $row->cod_barra . "</td>";
        print "<td>" . $_POST['marca'] = $row->marca . "</td>";
        print "<td>" . $_POST['fornecedor'] = $row->fornecedor . "</td>";
        print "<td>" . $_POST['quantidade'] = $row->quantidade . "</td>";
        print "<td>
            <button onclick=\"location.href='?acao=excluir&id=" . $row->id . "';\" class='btn btn-danger'>Excluir</button>
            <button onclick=\"location.href='?page=editar&id=" . $row->id . "';\" class='btn btn-success' >Editar</button>
            <td>";

        print "</tr>";
        print "</tbody";
      }
      print "</table>";
    }
    break;

  case 'pesquisa':

    if (!isset($_GET['busca'])) {
      echo "digite algo para buscar";
    } else {
      print "<style>article{display: none;} </style>";
      print "<style>.img1{display: none !important;}</style>";

      print "<table class='table text-center '>";
      print "<thead>";
      print "<tr>";
      print "<th>ID</th>";
      print "<th>Nome</th>";
      print "<th>Cod_barra</th>";
      print "<th>Marca</th>";
      print "<th>fornecedor</th>";
      print "<th>Quantidade</th>";
      print "</tr>";
      print "</thead>";

      $pesquisa = ($_GET['busca']);

      $sql = "SELECT * FROM 
  produtos WHERE cod_barra 
  LIKE '%$pesquisa%' OR nome LIKE '%$pesquisa%' 
  OR fornecedor LIKE '%$pesquisa%' OR marca LIKE '%$pesquisa%'";

      $result = $conn->query($sql) or die($conn->error);
      print "<tbody>";
      if ($result->num_rows == 0) {
        print "<td colspan = '6'>Nenhum resultado encontrado!!</td>";
      } else {


        while ($pesquisa = $result->fetch_object()) {
          print "<tr>";
          print "<th>" . $pesquisa->id . "</td>";
          print "<td>" . $pesquisa->nome . "</td>";
          print "<td>" . $pesquisa->cod_barra . "</td>";
          print "<td>" . $pesquisa->marca . "</td>";
          print "<td>" . $pesquisa->fornecedor . "</td>";
          print "<td>" . $pesquisa->quantidade . "</td>";
          print "<td> 
                <button onclick=\"location.href='?acao=excluir&id=" . $pesquisa->id . "';\" class='btn btn-danger'>Excluir</button>
                <button onclick=\"location.href='?page=editar&id=" . $pesquisa->id . "';\" class='btn btn-success' >Editar</button>
                <td>";
          print "</tr>";
          print "</tbody>";
        }

        print "<table>";
      }
    }
    break;

  case 'editar':
    $sql = "SELECT * FROM produtos WHERE id=" . $_REQUEST['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_object(); 


    
    if (!empty($_POST['addQtd'])) {
      $quantidade = $_POST['addQtd'];
      $sql = "UPDATE produtos SET quantidade = quantidade +'{$quantidade}' WHERE id=" . $_REQUEST['id'];
    }else{
      $quantidade = $_POST['retirarQtd'];
      if (!$quantidade > $row->quantidade) {
        $sql = "UPDATE produtos SET quantidade = quantidade -'{$quantidade}' WHERE id=" . $_REQUEST['id'];
      }else{
        print "<script> alert('Quantidade a ser retirada não pode ser maior que a quantidade disponivel! ');</script>";
        print "<script> window.location.href='./?index.php&&acao=listar';</script>";
      }
    }
      $result = $conn->query($sql);
    if ($result) {
      print "<script> alert('Produto editado!!');</script>";
      print "<script> window.location.href='./?index.php&&acao=listar';</script>";
    } else {
      echo "<script> alert('ERRO!!'); </script>";
    }
    break;
  case 'excluir':
    $sql = "DELETE FROM produtos WHERE id =" . $_REQUEST['id'];
    if ($result = $conn->query($sql)) {
      print "<script>alert('Produto excluido')</script>";
      print "<script>location.href='?acao=listar'</script>";
    }
    break;
}
?>
</html>