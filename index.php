<?php
require_once "clases/arbolBinario.php";

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pre = !empty($_POST["preorder"]) ? explode(",", str_replace(" ", "", $_POST["preorder"])) : [];
    $in = !empty($_POST["inorder"]) ? explode(",", str_replace(" ", "", $_POST["inorder"])) : [];
    $post = !empty($_POST["postorder"]) ? explode(",", str_replace(" ", "", $_POST["postorder"])) : [];

    $tree = new BinaryTree();

    if (!empty($pre) && !empty($in)) {
        $tree->root = $tree->buildFromPreIn($pre, $in);
    } elseif (!empty($post) && !empty($in)) {
        $tree->root = $tree->buildFromPostIn($post, $in);
    } else {
        $result = "<p style='color:red;'>Debes ingresar al menos Inorden + (Preorden o Postorden)</p>";
    }

    if ($tree->root) {
        $result .= "<h2>Recorridos:</h2>";
        $result .= "<p><b>Preorden:</b> " . implode(" → ", $tree->preorder($tree->root)) . "</p>";
        $result .= "<p><b>Inorden:</b> " . implode(" → ", $tree->inorder($tree->root)) . "</p>";
        $result .= "<p><b>Postorden:</b> " . implode(" → ", $tree->postorder($tree->root)) . "</p>";

        $result .= "<h2>Árbol:</h2>";
        $result .= '<div class="tree">'.$tree->renderHTML($tree->root).'</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Construcción de Árbol Binario</h1>
    <form method="POST">
        <label>Preorden:</label>
        <input type="text" name="preorder" placeholder="A,B,D,E,C"><br>

        <label>Inorden:</label>
        <input type="text" name="inorder" placeholder="D,B,E,A,C"><br>

        <label>Postorden:</label>
        <input type="text" name="postorder" placeholder="D,E,B,C,A"><br>

        <button type="submit">Construir</button>
    </form>

    <div class="result">
        <?= $result ?>
    </div>
</body>
</html>
