<?php
include 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    try {
        $sql = "INSERT INTO informacion (nombre, apellido) VALUES (:nombre, :apellido)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'apellido' => $apellido]);

        $message = 'Persona añadida con éxito!';
    } catch (PDOException $e) {
        $message = 'Error al la persona: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir persona</title>
</head>
<body>
<h2>Añadir nueva Persona</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="create.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="descripcion">Apellido:</label>
    <input type="text" name="apellido" id="apellido" required>
    <br>
    <input type="submit" value="Añadir persona">
</form>

</body>
</html>
