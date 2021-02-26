<?php

require 'bootstrap.php';

$datacenters = json_decode(file_get_contents('datacenters.json'), true);
$location = new Location($_SERVER['REMOTE_ADDR']);


$distances = [];


foreach ($datacenters as $datacenter)
{
    $distanceCalc = (new Distance())
        ->setBaseLat($location->getLat())
        ->setBaseLng($location->getLng())
        ->setDestinationLat($datacenter['latitude'])
        ->setDestinationLng($datacenter['longitude']);
    $distance = $distanceCalc->calculateDistance();

    $distances[] = ['location' => $datacenter['name'], 'distance' => $distance];
}

usort($distances, function($a, $b) {
    return $b['distance'] < $a['distance'] ;
});

print_r($distances); exit;
var_dump($sorted);
header('Content-type: application/json');
echo json_encode($sorted, JSON_PRETTY_PRINT);
