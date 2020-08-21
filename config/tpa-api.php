<?php

return array(

    /**
     *
     */
    'env' => getenv('TPA_PRODUCTION') ?: 'sandbox',

    /**
     *
     */
    'key' => getenv('TPA_KEY') ?:  '',

    /**
     *
     */
    'url' => array(
        'sandbox' => getenv('TPA_SANBOX_URL') ?: 'http://sandbox.travelparkingapps.com/api/v3/',
        'production' => getenv('TPA_PRODUCTION_URL') ?: 'https://www.travelparkingapps.com/api/v3/',
    ),

    /**
     *
     */
    'namespace' => 'https://www.travelparkingapps.com/api/v3',

    /**
     *
     */
    'services' => array(
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
    ),

    'currencies' => array(
        'AED',
        'ARS',
        'AUD',
        'BRL',
        'CAD',
        'CHF',
        'CNY',
        'CZK',
        'DKK',
        'EUR',
        'GBP',
        'HKD',
        'HUF',
        'JPY',
        'NOK',
        'NZD',
        'PLN',
        'SEK',
        'USD',
        'ZAR',
    ),

    'languages' => array(
        'ca',
        'cs',
        'da',
        'de',
        'el',
        'en',
        'es',
        'fr',
        'hu',
        'it',
        'ja',
        'nb',
        'nl',
        'no',
        'pl',
        'pt',
        'ro',
        'sv',
        'zh',
    ),
);
