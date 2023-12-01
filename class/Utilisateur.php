<?php

class Utilisateur
{
    private $id; 
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;

    public function __construct(array $post){
        $this->hydrater($post);
    }

    private function hydrater(array $post){
        foreach ($post as $cle => $valeur) {
            $methode = 'set' . ucfirst($cle);

            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMotDePasse()
    {
        return $this->motDePasse;
    }


    // SETTERS
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setMotDePasse(string $motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }


}
