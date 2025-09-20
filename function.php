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