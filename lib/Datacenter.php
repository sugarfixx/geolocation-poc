<?php


use Location;
use Distance;

class Datacenter
{
    public $location;

    public $datacenters;

    public $orderedList;

    public $closestDataCenter;

    public function __construct($ip)
    {
        $this->location = new Location($ip);
        $this->loadDatacenters();
        $this->setOrderedList();
    }

    public function loadDatacenters()
    {
        $this->datacenters = json_decode(
            file_get_contents('datacenters.json'), true);
    }

    public function setOrderedList()
    {
        $distances = [];

        foreach ($this->datacenters as $datacenter) {
            $distanceCalc = (new Distance())
                ->setBaseLat($this->location->getLat())
                ->setBaseLng($this->location->getLng())
                ->setDestinationLat($datacenter['latitude'])
                ->setDestinationLng($datacenter['longitude']);
            $distance = $distanceCalc->calculateDistance();

            $distances[] = ['location' => $datacenter['name'], 'distance' => $distance];
        }

        usort($distances, function ($a, $b) {
            return $b['distance'] < $a['distance'];
        });
        $this->setClosestDataCenter($distances[0]);
        $this->orderedList = $distances;
    }

    public function getOrderedList()
    {
        return $this->orderedList;
    }

    /**
     * @return mixed
     */
    public function getClosestDataCenter()
    {
        return $this->closestDataCenter;
    }

    /**
     * @param mixed $closestDataCenter
     */
    public function setClosestDataCenter($closestDataCenter)
    {
        $this->closestDataCenter = $closestDataCenter;
    }
}
