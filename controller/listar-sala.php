<h1>Listar Salas</h1>
<?php
    $sql = 'SELECT * FROM sala
            ORDER BY nome_sala';

    $result = $conn->query($sql);

    $qtd = $result->num_rows;

    if ($qtd > 0) {
        echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        echo "<table class='table table-bordered table-hover'>";
        echo '<tr>';
        echo '<th>#</th>';
        echo '<th>Nome da Sala</th>';
        echo '<th>Capacidade</th>';
        echo '<th>Adaptada para Deficientes</th>';
        echo '<th>Ações</th>';
        echo '</tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$row['id_sala'].'</td>';
            echo '<td>'.$row['nome_sala'].'</td>';
            echo '<td>'.$row['capacidade'].'</td>';
            echo '<td>'.$row['pcd'].'</td>';
            echo "<td>
				
					<button class='btn btn-success' onclick=\"location.href='index.php?page=editar-sala&id_sala=".$row['id_sala']."';\"><i class='fa fa-edit'></i></button>
					
					<button class='btn btn-danger' onclick=\"location.href='index.php?page=salvar-sala&acao=excluir&id_sala=".$row['id_sala']."';\"><i class='fa fa-trash'></i></button>
					
				   </td>";
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Não encontrou resultados';
    }

?>