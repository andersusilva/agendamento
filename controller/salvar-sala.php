<?php
    $id_sala = @$_REQUEST['id_sala'];
    $nome_sala = @$_REQUEST['nome_sala'];
    $capacidade = @$_REQUEST['capacidade'];
    $pcd = @$_REQUEST['pcd'];
    $tipo = @$_REQUEST['tipo'];

    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $sql = "INSERT INTO sala (id_sala, nome_sala, capacidade, pcd, tipo) 
                    VALUES ({$id_sala},'{$nome_sala}', '{$capacidade}', '{$pcd}', '{$tipo}')";

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Cadastrado com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível cadastrar</div>";
            }
        break;
        case 'editar':
            $sql = "UPDATE sala SET
						id_sala={$id_sala},
						nome_sala='{$nome_sala}',
						capacidade='{$capacidade}',
						pcd='{$pcd}',
						tipo='{$tipo}'
						
					WHERE
						id_sala=".$_REQUEST['id_sala'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Editada com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível editar</div>";
            }
        break;
        case 'excluir':
            $sql = 'DELETE FROM sala WHERE id_sala='.$_REQUEST['id_print'];

            $result = $conn->query($sql);

            if ($result == true) {
                echo "<div class='alert alert-success'>Excluido com sucesso!</div>";
            } else {
                echo "<div class='alert alert-danger'>Não foi possível excluir</div>";
            }
        break;
    }
