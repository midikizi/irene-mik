<?php

namespace App\Entity;

use App\Repository\ComptesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComptesRepository::class)]
class Comptes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $numero_compte = null;

    #[ORM\Column]
    private ?int $solde = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_ouvert = null;

    #[ORM\ManyToOne(inversedBy: 'client')]
    #[ORM\JoinColumn(nullable: false)]
    public ?Clients $clients = null;

    #[ORM\OneToMany(mappedBy: 'compte', targetEntity: Retraits::class)]
    public Collection $retraits;

    #[ORM\OneToMany(mappedBy: 'compte', targetEntity: Depot::class)]
    public Collection $depots;

    #[ORM\OneToMany(mappedBy: 'compte', targetEntity: Tontines::class)]
    public Collection $tontines;

    public function getClient() {
        return $this->clients;
    }

    public function setClient($client) {
        $this->clients= $client;
    }

    public function __construct()
    {
        $this->retraits = new ArrayCollection();
        $this->depots = new ArrayCollection();
        $this->tontines = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCompte(): ?string
    {
        return $this->numero_compte;
    }

    public function setNumeroCompte(string $numero_compte): static
    {
        $this->numero_compte = $numero_compte;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDateOuvert(): ?\DateTimeInterface
    {
        return $this->date_ouvert;
    }

    public function setDateOuvert(\DateTimeInterface $date_ouvert): static
    {
        $this->date_ouvert = $date_ouvert;

        return $this;
    }

    public function getClients(): ?Clients
    {
        return $this->clients;
    }

    public function setClients(?Clients $clients): static
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * @return Collection<int, Retraits>
     */
    public function getRetraits(): Collection
    {
        return $this->retraits;
    }

    public function addRetrait(Retraits $retrait): static
    {
        if (!$this->retraits->contains($retrait)) {
            $this->retraits->add($retrait);
            $retrait->setCompte($this);
        }

        return $this;
    }

    public function removeRetrait(Retraits $retrait): static
    {
        if ($this->retraits->removeElement($retrait)) {
            // set the owning side to null (unless already changed)
            if ($retrait->getCompte() === $this) {
                $retrait->setCompte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Depot>
     */
    public function getDepots(): Collection
    {
        return $this->depots;
    }

    public function addDepot(Depot $depot): static
    {
        if (!$this->depots->contains($depot)) {
            $this->depots->add($depot);
            $depot->setCompte($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): static
    {
        if ($this->depots->removeElement($depot)) {
            // set the owning side to null (unless already changed)
            if ($depot->getCompte() === $this) {
                $depot->setCompte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tontines>
     */
    public function getTontines(): Collection
    {
        return $this->tontines;
    }

    public function addTontine(Tontines $tontine): static
    {
        if (!$this->tontines->contains($tontine)) {
            $this->tontines->add($tontine);
            $tontine->setCompte($this);
        }

        return $this;
    }

    public function removeTontine(Tontines $tontine): static
    {
        if ($this->tontines->removeElement($tontine)) {
            // set the owning side to null (unless already changed)
            if ($tontine->getCompte() === $this) {
                $tontine->setCompte(null);
            }
        }

        return $this;
    }

    public function __toString(){

        return $this->numero_compte;
    }


}
