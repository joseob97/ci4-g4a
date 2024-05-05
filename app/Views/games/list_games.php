<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Juegos</title>
    <link rel="stylesheet" href="<?= base_url('css/estilos.css'); ?>">
</head>
<body>
<h1>Listado de Videojuegos</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Plataforma</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($games as $game): ?>
        <tr>
            <td><?= esc($game['id_juego']); ?></td>
            <td><?= esc($game['titulo']); ?></td>
            <td><?= esc($game['plataforma']); ?></td>
            <td><?= esc($game['precio']); ?> €</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= site_url('menu'); ?>">Volver al menú principal</a>

</body>
</html>
