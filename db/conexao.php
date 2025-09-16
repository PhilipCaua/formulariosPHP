<?php
    // Variáveis de conexão para banco de dados
    $host = "10.68.45.25";
    $usuario = "senac";
    $senha = "senac123";
    $banco = "atividades";

    // Criar a conexão com o banco de dados usando mysqli
    $conexao = new mysqli($host, $usuario, $senha, $banco);

    // Verificar se houve erro de conexão
    if ($conexao->connect_error) {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    echo "Conexão realizada com sucesso!";
?>