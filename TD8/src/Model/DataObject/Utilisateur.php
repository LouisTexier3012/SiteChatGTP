<?php

namespace App\Covoiturage\Model\DataObject;

use App\Covoiturage\Lib\MotDePasse;

class Utilisateur extends AbstractDataObject
{
    private string $login;
    private string $nom;
    private string $prenom;
	private string $password;
	private bool $admin;
		
    public function __construct(string $login, string $nom, string $prenom, string $password, bool $admin = false)
    {
        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
		$this->password = $password;
		$this->admin = $admin;
    }

    public function getLogin() : string
    {
        return $this->login;
    }

    public function getNom() : string
    {
        return $this->nom;
    }

    public function getPrenom() : string
    {
        return $this->prenom;
    }
	
	public function getPassword() : string
	{
		return $this->password;
	}
	
	public function setPassword(string $mdpClair) : void
	{
		$this->password = MotDePasse::hacher($mdpClair);
	}
	
	public function isAdmin() : bool
	{
		return $this->admin;
	}

    public function formatTableau(): array
    {
        return ["login" => $this->login,
				"prenom" => $this->prenom,
				"nom" => $this->nom,
				"password" => $this->password,
				"admin" => $this->admin == true ? 1 : 0];
    }
}