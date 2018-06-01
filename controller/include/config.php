<?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'krow24';
    $base = 'agendamento';

    $conn = new mysqli($host, $user, $pass, $base);

    if ($conn->connect_error) {
        die('Erro: '.$conn->connect_error);
    }
