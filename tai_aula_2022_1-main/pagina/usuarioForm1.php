<?php
include_once "../database/bd.php";
if (!empty($_GET['id']))
    {   
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM usuario WHERE id = $id";
        $result = $conn->query($sqlSelect);
        
        if($result->num_rows > 0)
        {
            while ($user_data)
        }
        $conn = $this->conn();
        $sql = "UPDATE usuario SET 'nome' = ?, 'telefone'= ?, 'cpf'= ? WHERE 'id' = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$dados['nome'], $dados['telefone'],
                 $dados['cpf'], $dados['id']];
        $st->execute($arrayDados);

        return $st;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $objBD = new BD();
    $objBD->conn();

    if (!empty($_GET['id'])) {
        $result = $objBD->buscar($_GET['id']);
        //select * from usuario where id = ?
    }
    if (!empty($_POST)) {

        if (empty($_GET['id'])) {
            $objBD->inserir($_POST);
        } else {
            $objBD->update($_POST);
        }
        header("Location: ./usuarioList.php");
    }
    ?>
    <h2>Formulário Cliente</h2>
    <form action="./usuarioForm.php" method="post">
        <input type="hidden" name="id" value="<?php echo !empty($result->id) ? $result->id : "" ?>" /><br>

        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo !empty($result->nome) ? $result->nome : "" ?>" /><br>

        <label>Telefone</label>
        <input type="text" name="telefone" value="<?php echo !empty($result->telefone) ? $result->telefone : "" ?>" /><br>

        <label>CPF</label>
        <input type="text" name="cpf" value="<?php echo !empty($result->cpf) ? $result->cpf : "" ?>" /><br>

        <input type="submit" value="Salvar" />
    </form>
    <a href="./usuarioList.php">Voltar</a> <br>
</body>

</html>