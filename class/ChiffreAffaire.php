<?php
class ChiffreAffaire
{
    private $idClient;
    private $dateFact;
    private $famille;
    private $idDestinataire;
    private $nomDestinataire;
    private $codeDepartement;
    private $nomDept;
    private $colis;
    private $poids;
    private $montant;
    private $frais;
    private $numBon;
    private $dateTransport;
    private $codeTournee;
    private $libelleTournee;

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
    public function getIdClient()
    {
        return $this->idClient;
    }

    public function getDateFact()
    {
        return $this->dateFact;
    }

    public function getFamille()
    {
        return $this->famille;
    }

    public function getIdDestinataire()
    {
        return $this->idDestinataire;
    }

    public function getNomDestinataire()
    {
        return $this->nomDestinataire;
    }

    public function getCodeDepartement()
    {
        return $this->codeDepartement;
    }

    public function getNomDept()
    {
        return $this->nomDept;
    }

    public function getColis()
    {
        return $this->colis;
    }

    public function getPoids()
    {
        return $this->poids;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function getFrais()
    {
        return $this->frais;
    }

    public function getNumBon()
    {
        return $this->numBon;
    }

    public function getDateTransport()
    {
        return $this->dateTransport;
    }

    public function getCodeTournee()
    {
        return $this->codeTournee;
    }

    public function getLibelleTournee()
    {
        return $this->libelleTournee;
    }

    // Setters
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }

    public function setDateFact($dateFact)
    {
        $this->dateFact = $dateFact;
    }
    public function setFamille($famille)
    {
        $this->famille = $famille;
    }

    public function setIdDestinataire($idDestinataire)
    {
        $this->idDestinataire = $idDestinataire;
    }

    public function setNomDestinataire($nomDestinataire)
    {
        $this->nomDestinataire = $nomDestinataire;
    }

    public function setCodeDepartement($codeDepartement)
    {
        $this->codeDepartement = $codeDepartement;
    }

    public function setNomDept($nomDept)
    {
        $this->nomDept = $nomDept;
    }

    public function setColis($colis)
    {
        $this->colis = $colis;
    }

    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    public function setFrais($frais)
    {
        $this->frais = $frais;
    }

    public function setNumBon($numBon)
    {
        $this->numBon = $numBon;
    }

    public function setDateTransport($dateTransport)
    {
        $this->dateTransport = $dateTransport;
    }

    public function setCodeTournee($codeTournee)
    {
        $this->codeTournee = $codeTournee;
    }

    public function setLibelleTournee($libelleTournee)
    {
        $this->libelleTournee = $libelleTournee;
    }
}
