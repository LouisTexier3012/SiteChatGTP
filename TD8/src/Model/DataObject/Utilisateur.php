<?php

namespace App\Covoiturage\Model\DataObject;

use App\Covoiturage\Lib\MotDePasse;

class Utilisateur extends AbstractDataObject
{
    private string $login;
    private string $nom;
    private string $prenom;
		private string $password;
		
    public function __construct(string $login, string $nom, string $prenom, string $password)
    {
        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
		$this->password = $password;
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
	
	public function getPassword(): string
	{
		return $this->password;
	}
	
	public function setPassword(string $mdpClair): void
	{
		$this->password = MotDePasse::hacher($mdpClair);
	}

    public function formatTableau(): array
    {
        return ["login" => $this->login,
				"prenom" => $this->prenom,
				"nom" => $this->nom,
				"password" => $this->password];
    }
}