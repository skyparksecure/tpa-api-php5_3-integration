<?php

namespace TpaApi;

use TpaApi\Webservices\Services\AirportService;

require_once 'bootstrap.php';

$airportService = new AirportService();

$airports = $airportService->all();
$airports = $airports->toArray();

$terminalResults = array();
foreach ($airports as $key => $airport) {
    $terminals = $airport['Terminals'];

    if (array_key_exists('TerminalDTO', $terminals)) {
        if (array_key_exists('EnglishName', $terminals['TerminalDTO'])) {
            $terminal = $terminals['TerminalDTO'];
            array_push($terminalResults, array(
                'id' => $terminal['Id'],
                'name' => $terminal['Name'],
                'local_name' => $terminal['LocalisedName'],
                'english_name' => $terminal['EnglishName'],
                'airport_code' => $airport['Code'],
            ));
        } else {
            foreach ($terminals['TerminalDTO'] as $terminal) {
                array_push($terminalResults, array(
                    'id' => $terminal['Id'],
                    'name' => $terminal['Name'],
                    'local_name' => $terminal['LocalisedName'],
                    'english_name' => $terminal['EnglishName'],
                    'airport_code' => $airport['Code'],
                ));
            }
        }
    }
}
echo json_encode($terminalResults);

die();