<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpruntRepository::class)
 */
class Emprunt
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_emprunt;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_retour;

    /**
     * @ORM\ManyToOne(targetEntity=Livre::class, inversedBy="emprunts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $livre_id;

    /**
     * @ORM\ManyToOne(targetEntity=Abonne::class, inversedBy="emprunts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $abonne_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEmprunt(): ?\DateTimeInterface
    {
        return $this->date_emprunt;
    }

    public function setDateEmprunt(\DateTimeInterface $date_emprunt): self
    {
        $this->date_emprunt = $date_emprunt;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->date_retour;
    }

    public function setDateRetour(?\DateTimeInterface $date_retour): self
    {
        $this->date_retour = $date_retour;

        return $this;
    }

    public function getLivreId(): ?Livre
    {
        return $this->livre_id;
    }

    public function setLivreId(?Livre $livre_id): self
    {
        $this->livre_id = $livre_id;

        return $this;
    }

    public function getAbonneId(): ?Abonne
    {
        return $this->abonne_id;
    }

    public function setAbonneId(?Abonne $abonne_id): self
    {
        $this->abonne_id = $abonne_id;

        return $this;
    }
}
