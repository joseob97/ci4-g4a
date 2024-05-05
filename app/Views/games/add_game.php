<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Nuevo Juego</title>
    <link rel="stylesheet" href="<?= base_url('css/estilos.css'); ?>">
</head>
<body>
<div id="header">
    <h1>GAMES4ALL</h1>
    <h4>Introduce un nuevo juego o revisa la información existente</h4>
</div>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
<?php endif; ?>

<form action="<?= site_url('games/create'); ?>" method="post" enctype="multipart/form-data">
    <label for="plataforma">Plataforma:</label>
    <select name="plataforma" id="plataforma" required>
        <option value="PC">PC</option>
        <option value="Nintendo Switch">Nintendo Switch</option>
        <option value="PlayStation 4">PlayStation 4</option>
        <option value="PlayStation 5">PlayStation 5</option>
        <option value="Xbox One">Xbox One</option>
        <option value="Xbox Series">Xbox Series</option>
    </select>
    <input type="text" name="titulo" required placeholder="Título del juego">
    <input type="number" min="0" step="0.01" name="precio" required placeholder="Precio">
    <input type="number" min="0" max="100" step="1" name="rebaja" placeholder="Rebaja (opcional)">
    <input type="number" min="0" name="stock" required placeholder="Stock">
    <select name="formato" required>
        <option value="0">Físico</option>
        <option value="1">Digital</option>
    </select>
    <input type="text" name="genero" placeholder="Género (solo si es nuevo juego)">
    <textarea name="descripcion" placeholder="Descripción (solo si es nuevo juego)"></textarea>
    <input type="file" name="imagen" accept="image/*" placeholder="Imagen (solo si es nuevo juego)">
    <input type="submit" value="Introducir Juego">
</form>

<h2>Información de Juegos Existentes</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Juego</th>
            <th>Género</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($info_juegos as $info): ?>
            <tr>
                <td><?= esc($info->id_info); ?></td>
                <td><?= esc($info->titulo_juego); ?></td>
                <td><?= esc($info->genero); ?></td>
                <td><?= esc($info->descripcion); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= site_url('games/list'); ?>">Volver a la lista de juegos</a>

</body>
</html>
