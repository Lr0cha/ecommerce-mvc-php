<?php
// carregar as classes automaticamente a partir das pastas especificadas.
spl_autoload_register(function($className){
    $folders = ['models/', 'controllers/', 'views/'];

    foreach ($folders as $folder) {
        $file = $folder . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
?>
