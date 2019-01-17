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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Matchup", mappedBy="winCompetitor")
     */
    private $wins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Matchup", mappedBy="comp1")
     */
    private $matchups1;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Matchup", mappedBy="comp2")
     */
    private $matchups2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pic;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\VideoGame", inversedBy="competitors")
     */
    private $videogames;

    public function __construct()
    {
        $this->wins = new ArrayCollection();
        $this->matchups1 = new ArrayCollection();
        $this->matchups2 = new ArrayCollection();
        $this->videogames = new ArrayCollection();
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
     * @return Collection|Matchup[]
     */
    public function getWins(): Collection
    {
        return $this->wins;
    }

    public function addWin(Matchup $win): self
    {
        if (!$this->wins->contains($win)) {
            $this->wins[] = $win;
            $win->setWinCompetitor($this);
        }

        return $this;
    }

    public function removeWin(Matchup $win): self
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
     * @return Collection|Matchup[]
     */
    public function getMatchups1(): Collection
    {
        return $this->matchups1;
    }

    public function addMatchups1(Matchup $matchups1): self
    {
        if (!$this->matchups1->contains($matchups1)) {
            $this->matchups1[] = $matchups1;
            $matchups1->setComp1($this);
        }

        return $this;
    }

    public function removeMatchups1(Matchup $matchups1): self
    {
        if ($this->matchups1->contains($matchups1)) {
            $this->matchups1->removeElement($matchups1);
            // set the owning side to null (unless already changed)
            if ($matchups1->getComp1() === $this) {
                $matchups1->setComp1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Matchup[]
     */
    public function getMatchups2(): Collection
    {
        return $this->matchups2;
    }

    public function addMatchups2(Matchup $matchups2): self
    {
        if (!$this->matchups2->contains($matchups2)) {
            $this->matchups2[] = $matchups2;
            $matchups2->setComp2($this);
        }

        return $this;
    }

    public function removeMatchups2(Matchup $matchups2): self
    {
        if ($this->matchups2->contains($matchups2)) {
            $this->matchups2->removeElement($matchups2);
            // set the owning side to null (unless already changed)
            if ($matchups2->getComp2() === $this) {
                $matchups2->setComp2(null);
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

    /**
     * @return Collection|VideoGame[]
     */
    public function getVideogames(): Collection
    {
        return $this->videogames;
    }

    public function addVideogame(VideoGame $videogame): self
    {
        if (!$this->videogames->contains($videogame)) {
            $this->videogames[] = $videogame;
        }

        return $this;
    }

    public function removeVideogame(VideoGame $videogame): self
    {
        if ($this->videogames->contains($videogame)) {
            $this->videogames->removeElement($videogame);
        }

        return $this;
    }
}
