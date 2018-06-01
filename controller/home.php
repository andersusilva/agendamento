<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"></head>
<body>
<h2>Bem Vindo (a)!</h2> 
<h3>Este é o Sistema da UDF que realiza agendamentos de salas.</h3>
<?php
    $sql = 'SELECT * FROM disciplina AS d
            INNER JOIN professor AS p
            ON p.id_professor = d.professor_id_professor
            INNER JOIN sala AS s
            ON s.id_sala = d.sala_id_sala';

    $result = $conn->query($sql);

    $qtd = $result->num_rows;

    if ($qtd > 0) {
        echo "<p>Foram encontrados <b>$qtd</b> sala (s) agendada (s)</p>";
        echo "<table class='table table-bordered table-striped table-hover table-info' class='img-thumbnail'>";
        echo '<tr>';
        echo '<th>#</th>';
        echo '<th>Sala</th>';
        echo '<th>Nome do Professor</th>';
        echo '<th>Sobrenome do Professor</th>';
        echo '<th>Disciplina</th>';
        echo '<th>Turno</th>';
        echo '</tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$row['id_disciplina'].'</td>';
            echo '<td>'.$row['nome_sala'].'</td>';
            echo '<td>'.$row['nome_professor'].'</td>';
            echo '<td>'.$row['sobrenome_professor'].'</td>';
            echo '<td>'.$row['nome_disciplina'].'</td>';
            echo '<td>'.$row['turno_disciplina'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Não encontrou resultados';
    }
?>
<!--
<img src="uploads/noimg.jpg" width="215" alt="Imagem 1" class="img-thumbnail">
<img src="uploads/noimg.jpg" width="215" alt="Imagem 2" class="img-thumbnail">
<img src="uploads/noimg.jpg" width="215" alt="Imagem 3" class="img-thumbnail">
<img src="uploads/noimg.jpg" width="215" alt="imagem 4" class="img-thumbnail">
<img src="uploads/noimg.jpg" width="215" alt="imagem 5" class="img-thumbnail">
-->
</body>
</html>