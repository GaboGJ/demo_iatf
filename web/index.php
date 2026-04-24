<?php 
session_start();
// Subimos un nivel para encontrar la configuración compartida
require_once(__DIR__ . '/../app/config.php'); 

include('./template/header.php'); 
?>

<body class="">

<?php 
// Definir la vista y acción por defecto
$vista = $_GET['view'] ?? 'welcome';
$action = $_GET['action'] ?? 'index';

include('./template/mensaje.php'); 
include('./template/navbar.php'); 

// Ahora las vistas están en la carpeta local 'views/'
$vistas_dir = './views/';

// Lógica de enrutamiento limpia
if ($vista === 'welcome') {
    $archivo_vista = $vistas_dir . 'welcome/index.php';
} else {
    $archivo_vista = $vistas_dir . $vista . '/' . $action . '.php';
}
?>

<main class="main-content mt-0">
    <?php
    if (file_exists($archivo_vista)) {
        include($archivo_vista);
    } else {
        // Intento secundario: buscar el index de la carpeta si la acción no existe
        $index_fallback = $vistas_dir . $vista . '/index.php';
        if (file_exists($index_fallback)) {
            include($index_fallback);
        } else {
            echo "<div class='container'><h2>Error 404: Página no encontrada.</h2></div>";
        }
    }
    ?>
</main>

<?php 
include('./template/footer.php');
include('./template/script.php'); 
?>
</body>
</html>