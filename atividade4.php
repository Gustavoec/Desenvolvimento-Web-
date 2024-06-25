<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Simples</title>
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
        input[type="number"], select {
            padding: 5px;
            font-size: 16px;
            margin: 5px 0;
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
</head>
<body>
    <h1>Calculadora Simples</h1>
    <form method="post" action="">
        <label for="num1">Número 1:</label><br>
        <input type="number" id="num1" name="num1" step="any"><br>
        <label for="num2">Número 2 (para operações exceto raiz quadrada):</label><br>
        <input type="number" id="num2" name="num2" step="any"><br>
        <label for="operation">Operação:</label><br>
        <select id="operation" name="operation" required>
            <option value="soma">Soma</option>
            <option value="subtracao">Subtração</option>
            <option value="multiplicacao">Multiplicação</option>
            <option value="divisao">Divisão</option>
            <option value="raiz">Raiz Quadrada</option>
        </select><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operation = $_POST["operation"];
        $result = "";

        switch ($operation) {
            case "soma":
                $result = $num1 + $num2;
                break;
            case "subtracao":
                $result = $num1 - $num2;
                break;
            case "multiplicacao":
                $result = $num1 * $num2;
                break;
            case "divisao":
                if ($num2 == 0) {
                    $result = "Erro: Divisão por zero!";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            case "raiz":
                if ($num1 < 0) {
                    $result = "Erro: Raiz quadrada de número negativo!";
                } else {
                    $result = sqrt($num1);
                }
                break;
            default:
                $result = "Operação inválida!";
        }

        echo "<div class='result'>O resultado da operação é: $result</div>";
    }
    ?>
</body>
</html>
