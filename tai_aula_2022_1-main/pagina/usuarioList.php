<?php
include "../database/bd.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h2>Listagem Clientes</h2>
    <form action="usuarioList.php" method="post">
        <input type="text" name="nome" placeholder="Pesquisar Nome">
        <input type="submit" value="Buscar" />
    </form>
    <a href="./usuarioForm.php">Cadastrar</a> <br>
    <?php
 
    $objBD = new BD();
    $objBD->conn();


    if(!empty($_POST['nome'])){
        $result = $objBD->pesquisar($_POST);
    }else{
        $result = $objBD->select();
    }

    if(!empty($_GET['id'])) {
        $objBD->remover($_GET['id']);
        header("location: usuarioList.php");
    }
    
    echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Ação</th>
                    <th>Ação</th>
                </tr>
            ";
    foreach ($result as $item) {
        echo "
        <tr>
            <td>" . $item['id'] . "</td>
            <td>" . $item['nome'] ."</td>
            <td>" . $item['telefone'] ."</td>
            <td>" . $item['cpf'] ."</td>
            <td><a href='./usuarioForm.php?id=" . $item['id'] . "'>Editar</a></td>
            <td><a href='./usuarioList.php?id=" . $item['id'] . "'
                   onclick=\"return confirm('Quer Excluir?') \" >Deletar</a></td>
        </tr>";
    }
    echo "</table>";
    ?>

     <a href="../index.php">Voltar</a>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>