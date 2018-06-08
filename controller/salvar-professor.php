<br>
<?php
    $nome_professor = @$_REQUEST['nome_professor'];
    $sobrenome_professor = @$_REQUEST['sobrenome_professor'];

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $sql = "INSERT INTO professor (nome_professor, sobrenome_professor)
			VALUES ('{$nome_professor}','{$sobrenome_professor}')";

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Cadastrado com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível cadastrar</div>";
            }
        break;
        case 'editar':
            $sql = "UPDATE professor SET
                        nome_professor='{$nome_professor}', 
                        sobrenome_professor='{$sobrenome_professor}'
                        WHERE id_professor=".$_REQUEST['id_professor'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Editado com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível editar</div>";
            }
        break;
        case 'excluir':
            $sql = 'DELETE FROM professor WHERE id_professor='.$_REQUEST['id_professor'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Excluido com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível excluir</div>";
            }
        break;
    }
?>






