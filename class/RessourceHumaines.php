<?php

class RessourceHumaine
{
    private $employeId;
    private $nom;
    private $prenom;
    private $sexe;
    private $departement;
    private $titreDEmploi;
    private $dateDEmbauche;
    private $tauxDAbsenteisme;
    private $satisfaction;

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
    public function getEmployeId()
    {
        return $this->employeId;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function getDepartement()
    {
        return $this->departement;
    }

    public function getTitreDEmploi()
    {
        return $this->titreDEmploi;
    }

    public function getDateDEmbauche()
    {
        return $this->dateDEmbauche;
    }

    public function getTauxDAbsenteisme()
    {
        return $this->tauxDAbsenteisme;
    }

    public function getSatisfaction()
    {
        return $this->satisfaction;
    }

    // Setters
    public function setEmployeId($employeId)
    {
        $this->employeId = $employeId;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }

    public function setTitreDEmploi($titreDEmploi)
    {
        $this->titreDEmploi = $titreDEmploi;
    }

    public function setDateDEmbauche($dateDEmbauche)
    {
        $this->dateDEmbauche = $dateDEmbauche;
    }

    public function setTauxDAbsenteisme($tauxDAbsenteisme)
    {
        $this->tauxDAbsenteisme = $tauxDAbsenteisme;
    }

    public function setSatisfaction($satisfaction)
    {
        $this->satisfaction = $satisfaction;
    }
}
