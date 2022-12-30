<?php

namespace App\Covoiturage\Model\DataObject;

use App\Covoiturage\Lib\MotDePasse;

class Utilisateur extends AbstractDataObject
{
    private string $login;
	private ?string $unchecked;
	private ?string $email;
	private ?string $nonce;
    private string $nom;
    private string $prenom;
	private string $password;
	private bool $admin;
		
    public function __construct(string $login, ?string $unchecked, ?string $email, ?string $nonce, string $nom, string $prenom, string $password, bool $admin)
    {
        $this->login = $login;
		$this->unchecked = $unchecked;
		$this->email = $email;
		$this->nonce = $nonce;
        $this->nom = $nom;
        $this->prenom = $prenom;
		$this->password = $password;
		$this->admin = $admin;
    }

    public function getLogin() : string
    {
        return $this->login;
    }
	
	public function getUnchecked(): ?string
	{
		return $this->unchecked;
	}
	
	public function setUnchecked(?string $unchecked): void
	{
		$this->unchecked = $unchecked;
	}
	
	public function setEmail(string $email): void
	{
		$this->email = $email;
	}
	
	public function getEmail(): ?string
	{
		return $this->email;
	}
	
	public function getNonce(): ?string
	{
		return $this->nonce;
	}
	
	public function setNonce(?string $nonce): void
	{
		$this->nonce = $nonce;
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
				"unchecked" => $this->unchecked,
				"email" => $this->email,
				"nonce" => $this->nonce,
				"prenom" => $this->prenom,
				"nom" => $this->nom,
				"password" => $this->password,
				"admin" => $this->admin ? 1 : 0];
    }
}