<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST["accion"];

    if (!isset($_POST["numero"]) || 
        !filter_var($_POST["numero"], FILTER_VALIDATE_INT) || 
        $_POST["numero"] <= 0) {
        
        if (isset($_POST["numero"])) {
            echo "<h2>Error: debe ingresar un número entero positivo.</h2>";
        }
        ?>
        <form method="post">
            <label>Ingrese un número entero positivo:</label>
            <input type="number" name="numero" min="1" step="1" required>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <button type="submit">Calcular</button>
        </form>
        <?php
    } else {
        $numero = intval($_POST["numero"]);

        if ($accion === "fibonacci") {
            function fibonacci($n) {
                $a = 0;
                $b = 1;
                $resultado = [];
                for ($i = 0; $i < $n; $i++) {
                    $resultado[] = $a;
                    $temp = $a + $b;
                    $a = $b;
                    $b = $temp;
                }
                return $resultado;
            }
            echo "<h3>Secuencia Fibonacci de $numero cifras:</h3>";
            echo implode(", ", fibonacci($numero));
        }

        if ($accion === "factorial") {
            function factorial($n) {
            return $n <= 1 ? 1 : $n * factorial($n - 1);
        }

        echo "<h3>Factorial de $numero:</h3>";

        $factores = [];
        for ($i = 1; $i <= $numero; $i++) {
            $factores[] = $i;
        }
        echo implode(" x ", $factores);

   
        echo " = " . factorial($numero);
}

        echo "<br><br><a href='index.html'>Volver al inicio</a>";
    }
}
?>