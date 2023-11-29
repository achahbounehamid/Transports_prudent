<?php

class Commerce
{
    private $annee;
    private $mois;
    private $codeDepartement;
    private $nomDept;
    private $chiffreAffaires;

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
    public function getAnnee()
    {
        return $this->annee;
    }

    public function getMois()
    {
        return $this->mois;
    }

    public function getCodeDepartement()
    {
        return $this->codeDepartement;
    }

    public function getNomDept()
    {
        return $this->nomDept;
    }

    public function getChiffreAffaires()
    {
        return $this->chiffreAffaires;
    }

    // Setters
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }

    public function setMois($mois)
    {
        $this->mois = $mois;
    }

    public function setCodeDepartement($codeDepartement)
    {
        $this->codeDepartement = $codeDepartement;
    }

    public function setNomDept($nomDept)
    {
        $this->nomDept = $nomDept;
    }

    public function setChiffreAffaires($chiffreAffaires)
    {
        $this->chiffreAffaires = $chiffreAffaires;
    }
}
