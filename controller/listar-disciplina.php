<h1>Listar Disciplinas</h1>
<?php
    $sql = 'SELECT * FROM disciplina AS s
            INNER JOIN sala AS d
            ON s.id_disciplina = d. id_sala';

    $result = $conn->query($sql);

    $qtd = $result->num_rows;

    if ($qtd > 0) {
        echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        echo "<table class='table table-bordered table-hover'>";
        echo '<tr>';
        echo '<th>#</th>';
        echo '<th>Nome da Disciplina</th>';
        echo '<th>Turno:</th>';
        echo '<th>Ações</th>';
        echo '</tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$row['id_disciplina'].'</td>';
            echo '<td>'.$row['nome_disciplina'].'</td>';
            echo '<td>'.$row['turno_disciplina'].'</td>';
            echo "<td>
				
					<button class='btn btn-success' onclick=\"location.href='index.php?page=editar-disciplina&id_disciplina=".$row['id_disciplina']."';\"><i class='fa fa-edit'></i></button>
					
					<button class='btn btn-danger' onclick=\"location.href='index.php?page=salvar-disciplina&acao=excluir&id_disciplina=".$row['id_disciplina']."';\"><i class='fa fa-trash'></i></button>
					
				   </td>";
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Não encontrou resultados';
    }

?>