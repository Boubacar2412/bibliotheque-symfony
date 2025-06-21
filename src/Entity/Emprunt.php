<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dateEmprunt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateRetour = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    private ?Livre $Livre = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    private ?User $User = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEmprunt(): ?\DateTime
    {
        return $this->dateEmprunt;
    }

    public function setDateEmprunt(\DateTime $dateEmprunt): static
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    public function getDateRetour(): ?\DateTime
    {
        return $this->dateRetour;
    }

    public function setDateRetour(?\DateTime $dateRetour): static
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    public function getLivre(): ?Livre
    {
        return $this->Livre;
    }

    public function setLivre(?Livre $Livre): static
    {
        $this->Livre = $Livre;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }
}
