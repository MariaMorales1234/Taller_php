<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $texto =$_POST['texto'];
    $search=$_POST['search'];

    if(!empty($search)){
        $text_resal= str_ireplace($search,"<mark>$search</mark>",$texto);

        echo "<h2>Resultados...</h2>";
        echo "<p>$text_resal</p>";
    }else{
        echo "No se ingresó nada para ser buscado.";
    }
}
?>
