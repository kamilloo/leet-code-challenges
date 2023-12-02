<?php

//composer autoload
require_once './vendor/autoload.php';

$stops = [[7,12],[4,5,15],[6],[15,19],[9,12,13]];
//$stops = [[1,2,7],[3,6,7]];
$planner = new \App\Console\BusPlannerRouteCommand;

$number_of_buses = $planner->numBusesToDestination($stops, 15,12);
//$number_of_buses = $planner->numBusesToDestination($stops, 1,6);

print_r("Count Buses: {$number_of_buses}");

die();
