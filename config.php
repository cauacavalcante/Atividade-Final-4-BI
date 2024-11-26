<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Parâmetros de conexão ao banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "formulario_db";

        // Criar conexão
        $conn = new mysqli($servidor, $usuario, $senha, $banco);

        // Verificar conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Obter dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $mensagem = $_POST['mensagem'];

        // Preparar e executar a consulta SQL
        $sql = "INSERT INTO contatos (nome, email, celular, mensagem) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nome, $email, $celular, $mensagem);

        if ($stmt->execute()) {
            echo "<p>Dados enviados com sucesso!</p>";
        } else {
            echo "<p>Erro ao enviar os dados: " . $conn->error . "</p>";
        }

        // Fechar conexão
        $stmt->close();
        $conn->close();
    }
    ?>