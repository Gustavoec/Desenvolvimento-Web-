<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contar Caracteres</title>
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
        input[type="text"] {
            padding: 5px;
            font-size: 16px;
            width: 300px;
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
    <h1>Contar Caracteres</h1>
    <form method="post" action="">
        <label for="text">Digite uma palavra ou texto:</label><br>
        <input type="text" id="text" name="text" required>
        <input type="submit" value="Contar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        $length = strlen($text);
        echo "<div class='result'>A string digitada possui $length caracteres.</div>";
    }
    ?>
</body>
</html>
