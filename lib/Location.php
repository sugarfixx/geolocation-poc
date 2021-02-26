<?php


class Location
{
    private $lat;
    private $lng;
    private $ip;

    public function __construct($ip = null)
    {
        if ($ip) {
            $this->ip = $ip;
            $this->getGeoData();
        }
    }

    private function getGeoData()
    {
        $data = unserialize(
            file_get_contents('http://www.geoplugin.net/php.gp?ip='.$this->ip)
        );
        $this->setLat($data['geoplugin_latitude']);
        $this->setLng($data['geoplugin_longitude']);
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     * @return Location
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     * @return Location
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     * @return Location
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }
}
