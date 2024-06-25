<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Números Múltiplos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .multiplo {
            margin: 5px 0;
        }
        .multiplo-3 {
            color: blue;
        }
        .multiplo-5 {
            color: green;
        }
        .multiplo-3-5 {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Números Múltiplos de 3, 5 e 3 e 5</h1>
    <?php
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "<div class='multiplo multiplo-3-5'>Número $i é múltiplo de 3 e 5</div>";
        } elseif ($i % 3 == 0) {
            echo "<div class='multiplo multiplo-3'>Número $i é múltiplo de 3</div>";
        } elseif ($i % 5 == 0) {
            echo "<div class='multiplo multiplo-5'>Número $i é múltiplo de 5</div>";
        }
    }
    ?>
</body>
</html>
