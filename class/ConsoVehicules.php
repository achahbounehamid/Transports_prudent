<?php

class ConsoVehicules
{
    private $moisConso;
    private $anneeConso;
    private $immatVehicule;
    private $litreConso;
    private $distanceKm;

    public function __construct(array $post)
    {
        $this->hydrate($post);
    }

    private function hydrate(array $post)
    {
        foreach ($post as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getters
    public function getMoisConso()
    {
        return $this->moisConso;
    }

    public function getAnneeConso()
    {
        return $this->anneeConso;
    }

    public function immatVehicule()
    {
        return $this->immatVehicule;
    }

    public function litreConso()
    {
        return $this->litreConso;
    }
    public function distanceKm()
    {
        return $this->distanceKm;
    }

    

    // Setters
    public function setMoisConso($moisConso)
    {
        $this->moisConso = $moisConso;
    }

    public function setAnneeConso($anneeConso)
    {
        $this->anneeConso = $anneeConso;
    }

    public function setImmatVehicule($immatVehicule)
    {
        $this->immatVehicule = $immatVehicule;
    }

    public function setLitreConso($litreConso)
    {
        $this->litreConso = $litreConso;
    }

    public function setDistanceKm($distanceKm)
    {
        $this->distanceKm = $distanceKm;
    }

    
}
