<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $profession = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\OneToMany(mappedBy: 'clients', targetEntity: Comptes::class)]
    private Collection $client;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Retraits::class)]
    private Collection $retraits;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Pret::class)]
    private Collection $prets;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Depot::class)]
    private Collection $depots;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Tontines::class)]
    private Collection $tontines;

    public function __construct()
    {
        $this->client = new ArrayCollection();
        $this->retraits = new ArrayCollection();
        $this->prets = new ArrayCollection();
        $this->depots = new ArrayCollection();
        $this->tontines = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

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

    /**
     * @return Collection<int, Comptes>
     */

    /**
     * @return Collection<int, Comptes>
     */
    public function getClient(): Collection
    {
        return $this->client;
    }

    public function addClient(Comptes $client): static
    {
        if (!$this->client->contains($client)) {
            $this->client->add($client);
            $client->setClients($this);
        }

        return $this;
    }

    public function removeClient(Comptes $client): static
    {
        if ($this->client->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getClients() === $this) {
                $client->setClients(null);
            }
        }

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
            $retrait->setClient($this);
        }

        return $this;
    }

    public function removeRetrait(Retraits $retrait): static
    {
        if ($this->retraits->removeElement($retrait)) {
            // set the owning side to null (unless already changed)
            if ($retrait->getClient() === $this) {
                $retrait->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pret>
     */
    public function getPrets(): Collection
    {
        return $this->prets;
    }

    public function addPret(Pret $pret): static
    {
        if (!$this->prets->contains($pret)) {
            $this->prets->add($pret);
            $pret->setClient($this);
        }

        return $this;
    }

    public function removePret(Pret $pret): static
    {
        if ($this->prets->removeElement($pret)) {
            // set the owning side to null (unless already changed)
            if ($pret->getClient() === $this) {
                $pret->setClient(null);
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
            $depot->setClient($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): static
    {
        if ($this->depots->removeElement($depot)) {
            // set the owning side to null (unless already changed)
            if ($depot->getClient() === $this) {
                $depot->setClient(null);
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
            $tontine->setClient($this);
        }

        return $this;
    }

    public function removeTontine(Tontines $tontine): static
    {
        if ($this->tontines->removeElement($tontine)) {
            // set the owning side to null (unless already changed)
            if ($tontine->getClient() === $this) {
                $tontine->setClient(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->nom;
    }

}
