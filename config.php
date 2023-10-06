<?php

define('CKFINDER_PATH', './js/ckfinder/');

// Konfigurasi CKFinder.
$config = array(
    'basePath' => '',
    'baseUrl' => './js/ckfinder/userfiles/', 
    'thumbsPath' => 'thumbs/',
    'imagesPath' => 'images/',
    'filesPath' => 'files/',
);


require CKFINDER_PATH . 'core/connector/php/connector.php';
?>
