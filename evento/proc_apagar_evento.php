<?php

session_start();
include_once 'conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_events = "DELETE FROM events WHERE id='$id'";
    $resultado_events = mysqli_query($conn, $result_events);
    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Evento apagado com sucesso</p>";
        header('Location: index.php');
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro o evento não foi apagado com sucesso</p>";
        header('Location: index.php');
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um evento</p>";
    header('Location: index.php');
}
