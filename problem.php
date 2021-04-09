<?php
require_once('vendor/autoload.php');

$container = new DI\Container();
$container->get('App\Problems\FactorialDigitSum\Problem');
