<?php
if ($_SERVER["$REQUEST_METHOD"] == "$_POST"){
    $entradaA = $_POST["ConjuntoA"];
    $entradaB = $_POST["ConjuntoB"];
    $A = array_unique(array_map('intval', array_map('trim', explode(",", $entradaA))));
    $B = array_unique(array_map('intval', array_map('trim', explode(",", $entradaB))));
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