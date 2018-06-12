<br>
<?php
    $id_disciplina = @$_REQUEST['id_disciplina'];
    $nome_disciplina = @$_REQUEST['nome_disciplina'];
    $sala_id_sala = @$_REQUEST['sala_id_sala'];
    $professor_id_professor = @$_REQUEST['professor_id_professor'];
    $nome_disciplina = @$_REQUEST['nome_disciplina'];
    $turno_disciplina = @$_REQUEST['turno_disciplina'];

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $sql = "INSERT INTO disciplina (nome_disciplina, turno_disciplina) 
            VALUES ('{$nome_disciplina}', '{$turno_disciplina}')";

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Cadastrado com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível cadastrar</div>";
            }
        break;
        case 'editar':
            $sql = "UPDATE disciplina SET
						nome_disciplina='{$nome_disciplina}',
						turno_disciplina='{$turno_disciplina}'
						
					WHERE
						id_disciplina=".$_REQUEST['id_disciplina'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Editado com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível editar</div>";
            }
        break;
        case 'excluir':
            $sql = 'DELETE FROM disciplina WHERE id_disciplina='.$_REQUEST['id_disciplina'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Excluido com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível excluir</div>";
            }
        break;
    }

?>





