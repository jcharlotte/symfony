<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="livres")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Emprunt::class, mappedBy="livre", orphanRemoval=true)
     */
    private $emprunts;


    public function __construct()
    {
        $this->emprunts = new ArrayCollection();
        $this->abonne = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Emprunt[]
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): self
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts[] = $emprunt;
            $emprunt->setLivreId($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): self
    {
        if ($this->emprunts->removeElement($emprunt)) {
            // set the owning side to null (unless already changed)
            if ($emprunt->getLivreId() === $this) {
                $emprunt->setLivreId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Emprunt[]
     */
    public function getAbonne(): Collection
    {
        return $this->abonne;
    }

    public function addAbonne(Emprunt $abonne): self
    {
        if (!$this->abonne->contains($abonne)) {
            $this->abonne[] = $abonne;
            $abonne->setLivre($this);
        }

        return $this;
    }

    public function removeAbonne(Emprunt $abonne): self
    {
        if ($this->abonne->removeElement($abonne)) {
            // set the owning side to null (unless already changed)
            if ($abonne->getLivre() === $this) {
                $abonne->setLivre(null);
            }
        }

        return $this;
    }
}
