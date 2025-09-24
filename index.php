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
    <h2>Ten en cuenta que los númerosdeben de ser enteros positivos</h2>
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
        </form>
    </div>
    
</body>
</html>