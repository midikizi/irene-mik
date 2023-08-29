<?php

namespace App\Entity;

use App\Repository\PretRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PretRepository::class)]
class Pret
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $somme = null;

    #[ORM\ManyToOne(inversedBy: 'prets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $client = null;





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSomme(): ?int
    {
        return $this->somme;
    }

    public function setSomme(int $somme): static
    {
        $this->somme = $somme;

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


}
