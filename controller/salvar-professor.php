<br>
<?php
    $professor = @$_REQUEST['nome_professor'];

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $sql = "INSERT INTO professor (nome_professor)
			VALUES ('{$professor}')";

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Cadastrou com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível cadastrar</div>";
            }
        break;
        case 'editar':
            $sql = "UPDATE professor SET nome_professor='{$professor}' WHERE id_professor=".$_REQUEST['id_professor'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Editou com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível editar</div>";
            }
        break;
        case 'excluir':
            $sql = 'DELETE FROM professor WHERE id_professor='.$_REQUEST['id_professor'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Excluiu com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível excluir</div>";
            }
        break;
    }
?>






