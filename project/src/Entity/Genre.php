<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seo;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\VideoGame", mappedBy="genres")
     */
    private $videoGames;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $acronym;

    public function __construct()
    {
        $this->videoGames = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSeo(): ?string
    {
        return $this->seo;
    }

    public function setSeo(string $seo): self
    {
        $this->seo = $seo;

        return $this;
    }

    /**
     * @return Collection|VideoGame[]
     */
    public function getVideoGames(): Collection
    {
        return $this->videoGames;
    }

    public function addVideoGame(VideoGame $videoGame): self
    {
        if (!$this->videoGames->contains($videoGame)) {
            $this->videoGames[] = $videoGame;
            $videoGame->addGenre($this);
        }

        return $this;
    }

    public function removeVideoGame(VideoGame $videoGame): self
    {
        if ($this->videoGames->contains($videoGame)) {
            $this->videoGames->removeElement($videoGame);
            $videoGame->removeGenre($this);
        }

        return $this;
    }

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }
}
