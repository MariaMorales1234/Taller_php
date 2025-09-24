<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número divisible</title>
    <link rel="stylesheets" href="css/styles.css">
</head>
<body>
    <h1>¿Mi Número es divisible?</h1>
    <h2>Ten en cuenta que los números deben de ser enteros positivos</h2>
    <div class="container">
        <form action="index.php" method="post">
            <label for="num1">Número 1:</label>
        <input type="text" id="num1" name="num1"
            value="
        <?php 
        echo isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : ''; 
        ?>">

        <label for="num2">Número 2:</label>
        <input type="text" id="num2" name="num2"
               value="
        <?php 
        echo isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : ''; 
        ?>">

        <button type="submit" name="comprobar">Comprobar</button>
        <button type="submit" name="limpiar">Limpiar</button>
        </form>
    </div>

    <div class="resultado">
    <?php
    function num($n) {
    return is_numeric($n) && intval($n) == floatval($n) && intval($n) > 0;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['limpiar'])){
        echo "<h2>Formulario reiniciado</h2>";
        }elseif(isset($_POST['comprobar'])){
            $num1 = trim($_POST['num1']);
            $num2 = trim($_POST['num2']);

            if($num1===""||$num2===""){
            echo "<h2>Debes ingresar ambos números.</h2>";
            } elseif(!is_numeric($num1)||!is_numeric($num2)){
            echo"<h2>Ambos valores deben ser numéricos.</h2>";
            } elseif(intval($num1)!=floatval($num1) && intval($num2)!=floatval($num2)){
            echo"<h2>Los números $num1 y $num2 no son enteros.</h2>";
            } elseif(!num($num1) && !num($num2)) {
            echo "<h2>Los números $num1 y $num2 no son enteros positivos.</h2>";
            } elseif(!num($num1)) {
            echo "<h2>El número $num1 no es un entero positivo.</h2>";
            } elseif(!num($num2)) {
            echo "<h2>El número $num2 no es un entero positivo.</h2>";
            } else{
                $num1 = intval($num1);
                $num2 = intval($num2);
                if($num1 % $num2 == 0){
                    echo "<h2>El número $num1 es divisible entre el número $num2.</h2>";
                } else {
                    echo "<h2>El número $num1 no es divisible entre el número $num2.</h2>";
                }
            }
        }
    }
    ?>
</body>
</html>