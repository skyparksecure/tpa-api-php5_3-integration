<?php

namespace TpaApi;

use TpaApi\Webservices\Models\ParkingOrderQueryFiltersDTO;
use TpaApi\Webservices\Services\ParkingService;

require_once 'bootstrap.php';

$parkingOrderQueryFilters = new ParkingOrderQueryFiltersDTO(array(
//    'CustomerNameOrEmail' => 'Jan 5d2c655a5f326',
    'VehicleRegistration' => '5d6e6',
//    'Products',
//    'Providers',
//    'Suppliers',
//    'Locations',
    'RecordsPerPage' => 10,
    'PageNumber' => 1,
));

$parkingService = new ParkingService();
$slimParkingOrderCollection = $parkingService->queryParkingOrders($parkingOrderQueryFilters);

var_dump($slimParkingOrderCollection);