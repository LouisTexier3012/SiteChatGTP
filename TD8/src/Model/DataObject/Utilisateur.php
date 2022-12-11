<?php

namespace App\Covoiturage\Model\DataObject;

use App\Covoiturage\Lib\MotDePasse;

class Utilisateur extends AbstractDataObject
{

    private string $login;
    private string $nom;
    private string $prenom;
		private string $mdpHache;
		
    public function __construct(string $login, string $nom, string $prenom, string $mdpHache)
    {
        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
				$this->mdpHache = $mdpHache;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }
	
	public function getMdpHache(): string
	{
		return $this->mdpHache;
	}
	
	public function setMdpHache(string $mdpClair): void
	{
		$this->mdpHache = MotDePasse::hacher($mdpClair);
	}

    public function formatTableau(): array
    {
        return array("login" => $this->login,
                     "prenom" => $this->prenom,
					           "nom" => $this->nom,
										 "mdpHache" => $this->mdpHache);
    }
}