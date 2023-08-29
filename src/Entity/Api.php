<?php

namespace App\Entity;

use App\Repository\ApiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiRepository::class)]
class Api
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 12)]
    private ?string $operateur = null;

    #[ORM\Column(length: 12)]
    private ?string $code_secret = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getOperateur(): ?string
    {
        return $this->operateur;
    }

    public function setOperateur(string $operateur): static
    {
        $this->operateur = $operateur;

        return $this;
    }

    public function getCodeSecret(): ?string
    {
        return $this->code_secret;
    }

    public function setCodeSecret(string $code_secret): static
    {
        $this->code_secret = $code_secret;

        return $this;
    }
}
