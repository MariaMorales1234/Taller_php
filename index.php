<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca en tu texto</title>
      <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ingrese un texto</h1>
    <form action="index.php" method="post">
        <label for="texto">Ingresar texto</label>
        <textarea type="text" id="texto" name="texto" required></textarea>

        <label for="search">Buscar en texto</label>
        <input type="text" id="search" name="search">

        <button type="submit">Buscar</button>
        <button type="reset">Limpiar</button>
    </form>
    <div class=">
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
    </div>
    
</body>
</html>