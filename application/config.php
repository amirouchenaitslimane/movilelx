<?php

if($_SERVER['SERVER_NAME'] === 'localhost') {
    define('DB_HOST', 'localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','movilelx');

}else if($_SERVER['SERVER_NAME'] === 'movilelx.site'){
    define('DB_HOST', 'localhost');
    define('DB_USER','u364358217_ami');
    define('DB_PASSWORD','675495309amirouche');
    define('DB_NAME','u364358217_movil');
}
?>