<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(type="datetimetz")
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $dateEnd;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\VideoGame", inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $videoGame;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Stream", inversedBy="events")
     */
    private $streams;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Matchup", mappedBy="event")
     */
    private $matchups;

    public function __construct()
    {
        $this->streams = new ArrayCollection();
        $this->matchups = new ArrayCollection();
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

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getVideoGame(): ?VideoGame
    {
        return $this->videoGame;
    }

    public function setVideoGame(?VideoGame $videoGame): self
    {
        $this->videoGame = $videoGame;

        return $this;
    }

    /**
     * @return Collection|Stream[]
     */
    public function getStreams(): Collection
    {
        return $this->streams;
    }

    public function addStream(Stream $stream): self
    {
        if (!$this->streams->contains($stream)) {
            $this->streams[] = $stream;
        }

        return $this;
    }

    public function removeStream(Stream $stream): self
    {
        if ($this->streams->contains($stream)) {
            $this->streams->removeElement($stream);
        }

        return $this;
    }

    /**
     * @return Collection|Matchup[]
     */
    public function getMatchups(): Collection
    {
        return $this->matchups;
    }

    public function addMatch(Matchup $matchup): self
    {
        if (!$this->matchups->contains($matchup)) {
            $this->matchups[] = $matchup;
            $matchup->setEvent($this);
        }

        return $this;
    }

    public function removeMatch(Matchup $matchup): self
    {
        if ($this->matchups->contains($matchup)) {
            $this->matchups->removeElement($matchup);
            // set the owning side to null (unless already changed)
            if ($matchup->getEvent() === $this) {
                $matchup->setEvent(null);
            }
        }

        return $this;
    }
}
