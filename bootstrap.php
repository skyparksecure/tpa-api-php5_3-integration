<?php

/* Root */
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Webservices' . DIRECTORY_SEPARATOR . 'WebService.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Webservices' . DIRECTORY_SEPARATOR . 'ServiceUrl.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Webservices' . DIRECTORY_SEPARATOR . 'Model.php';

// Autoloading function - check files with the .php extension under $path and loads them
function autoload($path) {
    $items = glob($path . DIRECTORY_SEPARATOR  . '*');

    foreach ($items as $item) {
        $pathInfo = pathinfo($item);
        $phpFile = ($pathInfo['extension'] === 'php');

        if (is_file($item) && $phpFile) {
            require_once $item;
        } elseif (is_dir($item)) {
            autoload($item);
        }
    }
}

// Load all classes under predefined directories
$sourceDirectories = array('Exceptions', 'Models', 'Services', 'Traits',);
foreach ($sourceDirectories as $srcDir) {
    autoload(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Webservices' . DIRECTORY_SEPARATOR . $srcDir);
}

/**
 * Apps specific global variables
 */

// Apps running state
//define('APP_STATE', 'production');
define('APP_STATE', 'development');

// TPA configurations
define('TPA_URL', (APP_STATE === 'production') ?
    'https://www.travelparkingapps.com/api/v3/' :
    'http://sandbox.travelparkingapps.com/api/v3/');
define('TPA_NAMESPACE', 'https://www.travelparkingapps.com/api/v3');
define('TPA_KEY', 'XXXX'); // LIVE
//define('TPA_KEY', 'XXXXX'); // YOU take the payment
//define('TPA_KEY', 'XXXXX'); // Looking4 takes the payment

define('TPA_SERVICES', json_encode(array(
    'Airport',
    'Country',
    'Information',
    'Location',
    'Parking',
    'Payment',
    'Port',
    'Pricing',
    'Product',
    'Reevoo',
    'Reviews',
    'Transfers',
    'AirportParking',
    'Booking',
    'PortParking',
    'Blog',
    'Email',
    'Lounge',
    'Members',
    'Redirects',
    'Support',
)));
