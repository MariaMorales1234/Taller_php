<?php
    if(isset($_POST['numeros'])){
    $numeros = array_map('floatval', explode(',', $_POST['numeros']));

    if(count($numeros) > 0){
        $promedio = array_sum($numeros) / count($numeros);
    
    sort($numeros);
        $count = count($numeros);
        if($count % 2 == 0){
            $media = ($numeros[$count/2 - 1] + $numeros[$count/2]) / 2;
        } else {
            $media = $numeros[floor($count/2)];
    }

    $valores = array_count_values($numeros);
        $maximo = max($valores);
        $moda = array_keys($valores, $maximo);
    }
} else {
    echo "No se enviaron números.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Resultados</h1>
        <p><strong>Promedio:</strong> <?php echo $promedio; ?></p>
        <p><strong>Media:</strong> <?php echo $media; ?></p>
        <p><strong>Moda:</strong> <?php echo implode(", ", $moda); ?></p>
        <a href="index.html"><button>Volver</button></a>
    </div>
</body>
</html>