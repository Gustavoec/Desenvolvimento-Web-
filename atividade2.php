<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Par ou Ímpar</title>
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
        }
        input[type="number"] {
            padding: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            font-size: 16px;
            margin-left: 10px;
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
</head>
<body>
    <h1>Verificar Par ou Ímpar</h1>
    <form method="post" action="">
        <label for="number">Digite um número:</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];
        if (is_numeric($number)) {
            if ($number % 2 == 0) {
                echo "<div class='result'>O número $number é Par.</div>";
            } else {
                echo "<div class='result'>O número $number é Ímpar.</div>";
            }
        } else {
            echo "<div class='result'>Por favor, insira um número válido.</div>";
        }
    }
    ?>
</body>
</html>
