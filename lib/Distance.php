<?php


class Distance
{
    private $base_lat;

    private $base_lng;

    private $destination_lat;

    private $destination_lng;

    /**
     * @return float
     */
    public function getBaseLat()
    {
        return $this->base_lat;
    }

    /**
     * @param float $base_lat
     * @return Distance
     */
    public function setBaseLat(float $base_lat)
    {
        $this->base_lat = $base_lat;
        return $this;
    }

    /**
     * @return float
     */
    public function getBaseLng()
    {
        return $this->base_lng;
    }

    /**
     * @param float $base_lng
     * @return Distance
     */
    public function setBaseLng(float $base_lng)
    {
        $this->base_lng = $base_lng;
        return $this;
    }

    /**
     * @return float
     */
    public function getDestinationLat()
    {
        return $this->destination_lat;
    }

    /**
     * @param float $destination_lat
     * @return Distance
     */
    public function setDestinationLat(float $destination_lat)
    {
        $this->destination_lat = $destination_lat;
        return $this;
    }

    /**
     * @return float
     */
    public function getDestinationLng()
    {
        return $this->destination_lng;
    }

    /**
     * @param float $destination_lng
     * @return Distance
     */
    public function setDestinationLng(float $destination_lng)
    {
        $this->destination_lng = $destination_lng;
        return $this;
    }


    public function calculateDistance()
    {
        //  Pythagorean theorem
        // d=√((x_2-x_1)²+(y_2-y_1)²)

        $x = $this->base_lat - $this->destination_lat;
        $y = $this->base_lng - $this->destination_lng;

        return sqrt(($x**2) + ($y**2));
    }
}
