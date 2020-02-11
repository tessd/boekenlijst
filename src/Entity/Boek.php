<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BoekRepository")
 */
class Boek
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ISBN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="float")
     */
    private $Prijs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Review", mappedBy="boekId")
     */
    private $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $Id): self
    {
        $this->Id = $Id;

        return $this;
    }

    public function getISBN(): ?int
    {
        return $this->ISBN;
    }

    public function setISBN(int $ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->Auteur;
    }

    public function setAuteur(string $Auteur): self
    {
        $this->Auteur = $Auteur;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getPrijs(): ?float
    {
        return $this->Prijs;
    }

    public function setPrijs(float $Prijs): self
    {
        $this->Prijs = $Prijs;

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setBoekId($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->removeElement($review);
            // set the owning side to null (unless already changed)
            if ($review->getBoekId() === $this) {
                $review->setBoekId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return (string)$this->getId();
    }
}
