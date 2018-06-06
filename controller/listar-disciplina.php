<h1>Listar Salas</h1>
<?php
    $sql = 'SELECT * FROM sala AS s
            INNER JOIN disciplina AS d
            ON s.id_sala = d.sala_id_sala
            INNER JOIN professor AS p
            ON p.id_professor = d.professor_id_professor';

    $result = $conn->query($sql);

    $qtd = $result->num_rows;

    if ($qtd > 0) {
        echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        echo "<table class='table table-bordered table-striped table-hover'>";
        echo '<tr>';
        echo '<th>#</th>';
        echo '<th>Nome da Sala:</th>';
        echo '<th>Nome do Professor</th>';
        echo '<th>Capacidade:</th>';
        echo '<th>Nome da Disciplina:</th>';
        echo '<th>Turno:</th>';
        echo '<th>Adaptada para Deficientes:</th>';
        echo '<th>Ações</th>';
        echo '</tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$row['id_sala'].'</td>';
            echo '<td>'.$row['nome_sala'].'</td>';
            echo '<td>'.$row['nome_professor'].'</td>';
            echo '<td>'.$row['capacidade'].'</td>';
            echo '<td>'.$row['nome_disciplina'].'</td>';
            echo '<td>'.$row['turno_disciplina'].'</td>';
            echo '<td>'.$row['pcd'].'</td>';
            echo "<td>
				
					<button class='btn btn-success' onclick=\"location.href='index.php?page=edit-print&id_print=".$row['id_print']."';\"><i class='fa fa-edit'></i></button>
					
					<button class='btn btn-danger' onclick=\"location.href='index.php?page=salvar-print&acao=excluir&id_print=".$row['id_print']."';\"><i class='fa fa-trash'></i></button>
					
				   </td>";
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Não encontrou resultados';
    }

?>