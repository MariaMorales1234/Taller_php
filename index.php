<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Busca en tu texto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>/ / Busca en tu texto / /</h1>
    <div class="container">
    <form action="index.php" method="post">
    <textarea id="texto" name="texto" required placeholder="Ingresar texto"><?php 
    if ($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['texto'])) {
                echo htmlspecialchars($_POST['texto']);
            }
        ?></textarea>
        <br>
        <label for="search">Buscar en texto</label>
        <input type="text" id="search" name="search"
               value="<?php 
                   if ($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST['search'])) {
                       echo htmlspecialchars($_POST['search']);
                   }
               ?>">
        <br>
        <button type="submit" name="buscar">Buscar</button>
        <button type="submit" name="limpiar">Limpiar</button>
    </form>

    <div class="result" id="resultado">
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['limpiar'])) {
        echo "<h2>Formulario reiniciado</h2>";
        }
        else if (isset($_POST['buscar'])) {
        $texto = $_POST['texto'];
        $search = trim($_POST['search']);
        if(!empty($search)){
        if (stripos($texto, $search) !== false) {
            $text_resal = str_ireplace($search,"<mark>$search</mark>",$texto);
            echo "<h2>Resultados...</h2>";
            echo "<p>$text_resal</p>";
            } else {
            echo "<h2>No hubo coincidencias</h2>";
            }
            }else{
            echo "<h2>No se ingresó nada para buscar</h2>";
            }
            }
        } else {
            echo "<h2>Ingresa texto y realiza una búsqueda</h2>";
        }
        ?>
    </div>
    </div>
</body>
</html>
