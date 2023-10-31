<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM informacion');
$personas = $stmt->fetchAll();
?>

<h2>Listado de Personas</h2>

<!-- Botón para crear un nuevo jabón -->
<a href="create.php">Crear nueva persona</a>
<br><br>

<ul>
<?php foreach ($personas as $person): ?>
    <li>
        <?php echo $person['nombre']; ?> - <?php echo $person['apellido']; ?>
        <a href="edit.php?id=<?php echo $person['id']; ?>">Editar</a>
        <a href="delete.php?id=<?php echo $person['id']; ?>">Eliminar</a>
    </li>
<?php endforeach; ?>
</ul>
