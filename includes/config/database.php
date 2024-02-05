<?php

function conectarDB(): mysqli {
    $db = mysqli_connect('localhost','root','mat23net90','bienesraices');
    if(!$db){
        echo "Error no se pudo conectar";
        exit; 
    }

    return $db;


}