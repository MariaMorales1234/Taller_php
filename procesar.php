<?php
$entradaA = $_POST["conjuntoA"] ?? "";
$entradaB = $_POST["conjuntoB"] ?? "";
$A = $B = $union = $interseccion = $diferenciaAB = $diferenciaBA = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (trim($entradaA) !== "") {
        $A = array_unique(array_map('intval', array_map('trim', explode(",", $entradaA))));
    }
    if (trim($entradaB) !== "") {
        $B = array_unique(array_map('intval', array_map('trim', explode(",", $entradaB))));
    }
    $union = array_unique(array_merge($A, $B));
    sort($union);
    $interseccion = array_intersect($A, $B);
    sort($interseccion);
    $diferenciaAB = array_diff($A, $B);
    sort($diferenciaAB);
    $diferenciaBA = array_diff($B, $A);
    sort($diferenciaBA);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Resultados</h2>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="resultados">
                <p>
                    <b>Conjunto A:</b> 
                    {<?= implode(",", $A) ?>}
                </p>
                <p>
                    <b>Conjunto B:</b> 
                    {<?= implode(",", $B) ?>}
                </p>
                <hr>
                <p>
                    <b>Unión:</b> 
                    {<?= implode(",", $union) ?>}
                </p>
                <p>
                    <b>Intersección:</b> 
                    {<?= implode(",", $interseccion) ?>}
                </p>
                <p>
                    <b>Diferencia AB:</b> 
                    {<?= implode(",", $diferenciaAB) ?>}
                </p>
                <p>
                    <b>Diferencia BA:</b> 
                    {<?= implode(",", $diferenciaBA) ?>}
                </p>
            </div>
        <?php else: ?>
            <p>No has enviado ningún conjunto aún.</p>
        <?php endif; ?>

        <br>
        <a href="index.html">Volver</a>
    </div>
</body>
</html>