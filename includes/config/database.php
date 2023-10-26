<?php

function conectarDB(): mysqli {
    $db = mysqli_connect('localhost', 'root', 'buda2023', 'tienda');
    
    if( !$db) {
        echo "Error No se puedo conectar";
        exit;
    }
    return $db;
}