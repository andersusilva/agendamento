<br>
<?php
    $id_disciplina = @$_REQUEST['id_disciplina'];
    $sala_id_sala = @$_REQUEST['sala_id_sala'];
    $professor_id_professor = @$_REQUEST['professor_id_professor'];
    $nome_disciplina = @$_REQUEST['nome_disciplina'];
    $turno_disciplina = @$_REQUEST['turno_disciplina'];

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $sql = "INSERT INTO print (erro_id_erro, nome_print, valor_print, ano_print, modelo_print, arquivo) VALUES ({$erro},'{$nome}', '{$valor}', '{$ano}', '{$modelo}', '{$arquivo}')";

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Cadastrou com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível cadastrar</div>";
            }
        break;
        case 'editar':
            $sql = "UPDATE print SET
						erro_id_erro={$erro},
						nome_print='{$nome}',
						valor_print='{$valor}',
						ano_print='{$ano}',
						modelo_print='{$modelo}',
						arquivo='{$arquivo}'
						
					WHERE
						id_print=".$_REQUEST['id_print'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Editou com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível editar</div>";
            }
        break;
        case 'excluir':
            $sql = 'DELETE FROM print WHERE id_print='.$_REQUEST['id_print'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Excluiu com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível excluir</div>";
            }
        break;
    }

?>





