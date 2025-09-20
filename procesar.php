<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $entrada = $_POST["numeros"];
    $lista = explode(",", $entrada);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Resultados</h2>
        <div class="resultados">
            <?php
            foreach($lista as $valor){
                $valor = trim($valor);
                if(filter_var($valor, FILTER_VALIDATE_INT) !== false){
                    if($valor %2 == 0){
                        echo "<p class='par'>$valor es un numero par</p>";
                    }else{
                        echo "<p class='impar'>$valor es un numero impar</p>";
                    }
                }else{
                    echo "<p class='noentero'>$valor no es un valor entero</p>";
                }
            }
            ?>
        </div>
        <br>
        <a href="index.html"><button>Volver</button></a>
    </div>
</body>
</html>