<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBo;

    /**
     * @ORM\Column(type="integer")
     */
    private $rounds;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isClosed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isFinished;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDraw;

    /**
     * @ORM\Column(type="integer")
     */
    private $score1;

    /**
     * @ORM\Column(type="integer")
     */
    private $score2;

    /**
     * @ORM\Column(type="integer")
     */
    private $winner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competitor", inversedBy="wins")
     */
    private $winCompetitor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="matches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $event;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bet", mappedBy="matchup")
     */
    private $bets;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competitor", inversedBy="matches1")
     * @ORM\JoinColumn(nullable=false)
     */
    private $comp1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competitor", inversedBy="matches2")
     * @ORM\JoinColumn(nullable=false)
     */
    private $comp2;

    public function __construct()
    {
        $this->bets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIsBo(): ?bool
    {
        return $this->isBo;
    }

    public function setIsBo(bool $isBo): self
    {
        $this->isBo = $isBo;

        return $this;
    }

    public function getRounds(): ?int
    {
        return $this->rounds;
    }

    public function setRounds(int $rounds): self
    {
        $this->rounds = $rounds;

        return $this;
    }

    public function getIsClosed(): ?bool
    {
        return $this->isClosed;
    }

    public function setIsClosed(bool $isClosed): self
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    public function getIsFinished(): ?bool
    {
        return $this->isFinished;
    }

    public function setIsFinished(bool $isFinished): self
    {
        $this->isFinished = $isFinished;

        return $this;
    }

    public function getIsDraw(): ?bool
    {
        return $this->isDraw;
    }

    public function setIsDraw(bool $isDraw): self
    {
        $this->isDraw = $isDraw;

        return $this;
    }

    public function getScore1(): ?int
    {
        return $this->score1;
    }

    public function setScore1(int $score1): self
    {
        $this->score1 = $score1;

        return $this;
    }

    public function getScore2(): ?int
    {
        return $this->score2;
    }

    public function setScore2(int $score2): self
    {
        $this->score2 = $score2;

        return $this;
    }

    public function getWinner(): ?int
    {
        return $this->winner;
    }

    public function setWinner(int $winner): self
    {
        $this->winner = $winner;

        return $this;
    }

    public function getWinCompetitor(): ?Competitor
    {
        return $this->winCompetitor;
    }

    public function setWinCompetitor(?Competitor $winCompetitor): self
    {
        $this->winCompetitor = $winCompetitor;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }

    /**
     * @return Collection|Bet[]
     */
    public function getBets(): Collection
    {
        return $this->bets;
    }

    public function addBet(Bet $bet): self
    {
        if (!$this->bets->contains($bet)) {
            $this->bets[] = $bet;
            $bet->setMatchup($this);
        }

        return $this;
    }

    public function removeBet(Bet $bet): self
    {
        if ($this->bets->contains($bet)) {
            $this->bets->removeElement($bet);
            // set the owning side to null (unless already changed)
            if ($bet->getMatchup() === $this) {
                $bet->setMatchup(null);
            }
        }

        return $this;
    }

    public function getComp1(): ?Competitor
    {
        return $this->comp1;
    }

    public function setComp1(?Competitor $comp1): self
    {
        $this->comp1 = $comp1;

        return $this;
    }

    public function getComp2(): ?Competitor
    {
        return $this->comp2;
    }

    public function setComp2(?Competitor $comp2): self
    {
        $this->comp2 = $comp2;

        return $this;
    }
}
