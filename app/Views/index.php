<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>G4A</title>
    <link rel="stylesheet" href="<?= base_url('css/estilos.css'); ?>">
</head>

<body style="background: url('<?= base_url('img/fondo1.png'); ?>') no-repeat center center fixed; background-size: cover;background-color: #4CC5B0; text-align: center; color: #000000;">
    <div id="header">
        <h1>GAMES4ALL</h1>
        <h4>¡Consigue tu juego preferido al mejor precio!</h4>
    </div>

    <div>
        <h4>¡Bienvenido!</h4>
        <br>
        <form method="POST" action="<?= site_url('login'); ?>">
            <input type="submit" name="Acceso" value="Acceso">
        </form>
        <br>
        <form method="POST" action="<?= site_url('register'); ?>">
            <input type="submit" name="Registro" value="Registro">
        </form>
    </div>
</body>
</html>