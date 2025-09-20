<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["numero"])) {
        // Si no se ha ingresado número, mostramos el formulario para pedirlo
        $accion = $_POST["accion"];
        ?>
        <form method="post">
            <label>Ingrese un número:</label>
            <input type="number" name="numero" required>
            <input type="hidden" name="accion" value="<?php echo $accion; ?>">
            <button type="submit">Calcular</button>
        </form>
        <?php
    } else {
        $numero = intval($_POST["numero"]);
        $accion = $_POST["accion"];

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
            echo "<h3>Secuencia Fibonacci de $numero:</h3>";
            echo implode(", ", fibonacci($numero));
        }

        if ($accion === "factorial") {
            function factorial($n) {
                return $n <= 1 ? 1 : $n * factorial($n - 1);
            }
            echo "<h3>Factorial de $numero:</h3>";
            echo factorial($numero);
        }
    }
}
?>