<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>G4A</title>
    <link rel="stylesheet" href="<?= base_url('estilos.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body style="background-color: #4CC5B0; text-align: center; color: #000000;">
    <div id="header">
        <h1>GAMES4ALL</h1>
        <h4>¡Consigue tu juego preferido al mejor precio!</h4>

        <!-- Iconos condicionales basados en el rol -->
        <?php if (session()->get('rol') !== 'administrador'): ?>
            <div style="position: absolute; top: 20px; left: 160px;">
                <a href="<?= site_url('ver_carrito'); ?>"><i class="fa-solid fa-cart-shopping fa-lg" style="color: #63E6BE;"></i></a>
            </div>
            <div style="position: absolute; top: 20px; left: 130px;">
                <a href="<?= site_url('buscar_juegos'); ?>"><i class="fa-solid fa-magnifying-glass" style="color: #63E6BE;"></i></a>
            </div>
        <?php endif; ?>
    </div>

    <div style="float: left; width: 20%; height: 350px;margin-top: -25px; background-color: #173E59; color: #ffffff;font-size: 25px;">
        <?php
        $rol = session()->get('rol');
        $alias = session()->get('alias');

        if ($rol == "administrador") {
            echo "Panel del $rol:<br> $alias";    //PANEL DEL ADMINISTRADOR
            ?>

            <a href="<?= site_url('gestionar_perfil'); ?>">Mostrar perfil</a><br>
            <a href="<?= site_url('gestionar_usuarios'); ?>">Gestionar usuarios</a><br>
            <a href="<?= site_url('gestionar_videojuegos'); ?>">Gestionar videojuegos</a><br>
            <a href="<?= site_url('gestionar_pedidos'); ?>">Gestionar pedidos</a><br>
            <a href="<?= site_url('gestionar_descuentos'); ?>">Gestionar descuentos</a><br>
            <a href="<?= site_url('logout'); ?>">Cerrar sesión</a>

            <?php
        } else {
            echo "Panel de $rol<br>Has iniciado sesión como:<br>$alias";    //PANEL DEL USUARIO
            ?>

            <a href="<?= site_url('consultar_pedidos'); ?>">Gestionar pedidos</a><br>
            <a href="<?= site_url('biblioteca'); ?>">Mi biblioteca de juegos</a><br>
            <a href="<?= site_url('consultar_descuentos'); ?>">Mis descuentos</a><br>
            <a href="<?= site_url('gestionar_perfil'); ?>">Mostrar perfil</a><br>
            <a href="<?= site_url('gestionar_tarjetas'); ?>">Gestionar tarjetas</a><br>
            <a href="<?= site_url('logout'); ?>">Cerrar sesión</a>

            <?php
        }
        ?>
    </div>
</body>
</html>
