<?php
if (isset($_SESSION['mensaje'])) {
    $icono = $_SESSION['icono'] ?? 'info';
    $mensaje = $_SESSION['mensaje'];
    $titulo = $_SESSION['titulo'] ?? 'Información';
    // Limpiar sesión para que no vuelva a mostrarse al refrescar
    unset($_SESSION['mensaje'], $_SESSION['icono'], $_SESSION['titulo']);
    echo "
    <script>
        Swal.fire({
            title: '$titulo',
            text: '$mensaje',
            icon: '$icono',
            confirmButtonText: 'Aceptar'
        });
    </script>";
}
?>
