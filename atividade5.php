<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Contato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
        }
        h1 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"], input[type="email"], textarea, select {
            padding: 5px;
            font-size: 16px;
            margin: 5px 0;
            width: 300px;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <h1>Contato</h1>
    <form method="post" action="">
        <label for="name">Nome:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="feedback">Tipo de Feedback:</label><br>
        <select id="feedback" name="feedback" required>
            <option value="">Selecione...</option>
            <option value="elogio">Elogio</option>
            <option value="sugestao">Sugestão</option>
            <option value="reclamacao">Reclamação</option>
            <option value="duvida">Dúvida</option>
        </select><br>
        <label for="message">Mensagem:</label><br>
        <textarea id="message" name="message" required></textarea><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $feedback = trim($_POST["feedback"]);
        $message = trim($_POST["message"]);
        
        if (empty($name) || empty($email) || empty($feedback) || empty($message)) {
            echo "<script>showAlert('Há dados sem preencher. Por favor, preencha todos os campos.');</script>";
        } else {
            echo "<script>
                    showAlert('Obrigado pelo feedback!');
                    window.location.href = 'index.php';  // Redirecionar para a página inicial
                  </script>";
            echo "<div class='result'>
                    <h2>Dados Recebidos:</h2>
                    <p><strong>Nome:</strong> $name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Tipo de Feedback:</strong> $feedback</p>
                    <p><strong>Mensagem:</strong> $message</p>
                  </div>";
        }
    }
    ?>
</body>
</html>
