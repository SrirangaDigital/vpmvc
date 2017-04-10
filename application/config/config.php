<?php

define('HOST_IP', 'http://localhost/');
define('BASE_URL', HOST_IP . 'vpmvc/');
define('PUBLIC_URL', BASE_URL . 'public/');
define('VOLUMES_URL', PUBLIC_URL . 'Volumes/');
define('DJVU_URL', VOLUMES_URL . 'djvu/');
define('PDF_URL', VOLUMES_URL . 'pdf/');
define('XML_SRC_URL', BASE_URL . 'md-src/xml/');
define('READWRITE_URL', PUBLIC_URL . 'ReadWrite/');
define('FLAT_URL', BASE_URL . 'application/views/flat/');
define('RESOURCES_URL', PUBLIC_URL . 'Resources/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/html/vpmvc/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_VOLUMES_URL', PHY_PUBLIC_URL . 'Volumes/');
define('PHY_DJVU_URL', PHY_VOLUMES_URL . 'djvu/');
define('PHY_PDF_URL', PHY_VOLUMES_URL . 'pdf/');
define('PHY_XML_SRC_URL', PHY_BASE_URL . 'md-src/xml/');
define('PHY_READWRITE_URL', PHY_PUBLIC_URL . 'ReadWrite/');
define('PHY_ARCHIVES_URL', PHY_PUBLIC_URL . 'Archives/');
define('PHY_TXT_URL', PHY_PUBLIC_URL . 'Text/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');
define('PHY_RESOURCES_URL', PHY_PUBLIC_URL . 'Resources/');

define('DB_PREFIX', 'vp');
define('DB_HOST', 'localhost');


define('DB_NAME', 'archives');
define('FEATURE', 'ಸಂಪಾದಕೀಯ|ಚಿತ್ರಕಥೆ|ವಿಶೇಷ ಲೇಖನ|ಪುಸ್ತಕ ಪರಿಚಯ|ಧಾರಾವಾಹಿ');

define('vpARCHIVES_USER', 'root');
define('vpARCHIVES_PASSWORD', 'mysql');
?>
