<?php

define('IN_LIB', true);

define('ROOT_PATH', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

if( !defined('LIBRARY_IGNORE_AUTOLOAD') ) {
    require_once ROOT_PATH . 'SplLoader.php';
    $autoloader = new SplLoader(
        DIRECTORY_SEPARATOR,
        '.php',
        '\\',
        array(ROOT_PATH)
    );
}