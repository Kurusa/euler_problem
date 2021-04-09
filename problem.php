<?php
const ALLOWED_PERMISSIONS = [
    'allow_alerts_api' => 'Allow Alerts API',
    'allow_reference_api' => 'Allow Reference API',
    'allow_proppy_api' => 'Allow Proppy API',
    'allow_locations_api' => 'Allow Locations API',
    'allow_cadastre_api' => 'Allow Cadastre API',
];

$results = [];
$q = 'Lo';
array_map(function ($key, $value) use (&$results, $q) {
    if (!empty($q)) {
        if (strpos($value, $q) !== false) {
            $results[] = [
                'id'   => $key,
                'text' => $value
            ];
        }
    } else {
        $results[] = [
            'id'   => $key,
            'text' => $value
        ];
    }
}, array_keys(ALLOWED_PERMISSIONS), ALLOWED_PERMISSIONS);


var_dump($results);
exit();
require_once('vendor/autoload.php');

$container = new DI\Container();
$container->get('App\Problems\FactorialDigitSum\Problem');