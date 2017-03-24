<?php

define('HOST_IP', 'http://localhost/');
define('BASE_URL', HOST_IP . 'vpmvc/');
define('PUBLIC_URL', BASE_URL . 'public/');
define('XML_SRC_URL', BASE_URL . 'md-src/xml/');
define('FLAT_URL', BASE_URL . 'application/views/flat/');
define('RESOURCES_URL', PUBLIC_URL . 'Resources/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/html/vpmvc/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_XML_SRC_URL', PHY_BASE_URL . 'md-src/xml/');
define('PHY_ARCHIVES_URL', PHY_PUBLIC_URL . 'Archives/');
define('PHY_TXT_URL', PHY_PUBLIC_URL . 'Text/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');
define('PHY_RESOURCES_URL', PHY_PUBLIC_URL . 'Resources/');

define('DB_PREFIX', 'vp');
define('DB_HOST', 'localhost');

// photo will become iitmPHOTO inside
define('DB_NAME', 'archives');

define('vpARCHIVES_USER', 'root');
define('vpARCHIVES_PASSWORD', 'mysql');
?>