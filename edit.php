<?php
include 'config.php';

// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE informacion SET nombre = ?, apellido = ? WHERE id = ?");
    $stmt->execute([$nombre, $apellido, $id]);

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM informacion WHERE id = $id");
$person = $stmt->fetch();

?>

<h2>Editar Persona</h2>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $person['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $person['nombre']; ?>"><br>
    Apellido <input type="text" name="apellido" value="<?php echo $person['apellido']; ?>"><br>
    <input type="submit" value="Guardar Cambios">
</form>
