<h1>Listar professores</h1>
<?php
    $sql = 'SELECT * FROM professor';

    $result = $conn->query($sql);

    $qtd = $result->num_rows;

    if ($qtd > 0) {
        echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        echo "<table class='table table-bordered table-hover'>";
        echo '<tr>';
        echo '<th>#</th>';
        echo '<th>Nome do professor</th>';
        echo '<th>Sobrenome do professor</th>';
        echo '<th>Ações</th>';
        echo '</tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$row['id_professor'].'</td>';
            echo '<td>'.$row['nome_professor'].'</td>';
            echo '<td>'.$row['sobrenome_professor'].'</td>';
            echo "<td>
					<button class='btn btn-success' onclick=\"location.href='index.php?page=editar-professor&id_professor=".$row['id_professor']."'\"><i class='fa fa-edit'></i></button>
					
					<button class='btn btn-danger' onclick=\"location.href='index.php?page=salvar-professor&acao=excluir&id_professor=".$row['id_professor']."'\"><i class='fa fa-trash'></i></button>
				   </td>";
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Não encontrou resultados';
    }
?>