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
    
}
?>