<?php

define('IN_LIB', true);

define('ROOT_PATH', __DIR__ . '/../src/');

if( !defined('LIBRARY_IGNORE_AUTOLOAD') ) {
    require_once ROOT_PATH . 'SplLoader.php';
    $autoloader = new SplLoader(
        DIRECTORY_SEPARATOR,
        '.php',
        '\\',
        array(ROOT_PATH)
    );
}