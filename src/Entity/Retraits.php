<?php

namespace App\Entity;

use App\Repository\RetraitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RetraitsRepository::class)]
class Retraits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_retrait = null;

    #[ORM\ManyToOne(inversedBy: 'retrait')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $client = null;

    #[ORM\ManyToOne(inversedBy: 'retrait')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Comptes $compte = null;




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

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->date_retrait;
    }

    public function setDateRetrait(\DateTimeInterface $date_retrait): static
    {
        $this->date_retrait = $date_retrait;

        return $this;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getCompte(): ?Comptes
    {
        return $this->compte;
    }

    public function setCompte(?Comptes $compte): static
    {
        $this->compte = $compte;

        return $this;
    }


}
