<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetitorRepository")
 */
class Competitor
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
     * @ORM\Column(type="string", length=15)
     */
    private $acronym;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $seo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isTeam;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Match", mappedBy="winCompetitor")
     */
    private $wins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Match", mappedBy="comp1")
     */
    private $matches1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Match", mappedBy="comp2")
     */
    private $matches2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pic;

    public function __construct()
    {
        $this->wins = new ArrayCollection();
        $this->matches1 = new ArrayCollection();
        $this->matches2 = new ArrayCollection();
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

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): self
    {
        $this->acronym = $acronym;

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

    public function getIsTeam(): ?bool
    {
        return $this->isTeam;
    }

    public function setIsTeam(bool $isTeam): self
    {
        $this->isTeam = $isTeam;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Collection|Match[]
     */
    public function getWins(): Collection
    {
        return $this->wins;
    }

    public function addWin(Match $win): self
    {
        if (!$this->wins->contains($win)) {
            $this->wins[] = $win;
            $win->setWinCompetitor($this);
        }

        return $this;
    }

    public function removeWin(Match $win): self
    {
        if ($this->wins->contains($win)) {
            $this->wins->removeElement($win);
            // set the owning side to null (unless already changed)
            if ($win->getWinCompetitor() === $this) {
                $win->setWinCompetitor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Match[]
     */
    public function getMatches1(): Collection
    {
        return $this->matches1;
    }

    public function addMatches1(Match $matches1): self
    {
        if (!$this->matches1->contains($matches1)) {
            $this->matches1[] = $matches1;
            $matches1->setComp1($this);
        }

        return $this;
    }

    public function removeMatches1(Match $matches1): self
    {
        if ($this->matches1->contains($matches1)) {
            $this->matches1->removeElement($matches1);
            // set the owning side to null (unless already changed)
            if ($matches1->getComp1() === $this) {
                $matches1->setComp1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Match[]
     */
    public function getMatches2(): Collection
    {
        return $this->matches2;
    }

    public function addMatches2(Match $matches2): self
    {
        if (!$this->matches2->contains($matches2)) {
            $this->matches2[] = $matches2;
            $matches2->setComp2($this);
        }

        return $this;
    }

    public function removeMatches2(Match $matches2): self
    {
        if ($this->matches2->contains($matches2)) {
            $this->matches2->removeElement($matches2);
            // set the owning side to null (unless already changed)
            if ($matches2->getComp2() === $this) {
                $matches2->setComp2(null);
            }
        }

        return $this;
    }

    public function getPic(): ?string
    {
        return $this->pic;
    }

    public function setPic(string $pic): self
    {
        $this->pic = $pic;

        return $this;
    }
}
