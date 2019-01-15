<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetRepository")
 */
class Bet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $winner;

    /**
     * @ORM\Column(type="integer")
     */
    private $score1;

    /**
     * @ORM\Column(type="integer")
     */
    private $score2;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDraw;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Match", inversedBy="bets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matchup;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competitor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $winCompetitor;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIsDraw(): ?bool
    {
        return $this->isDraw;
    }

    public function setIsDraw(bool $isDraw): self
    {
        $this->isDraw = $isDraw;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMatchup(): ?Match
    {
        return $this->matchup;
    }

    public function setMatchup(?Match $matchup): self
    {
        $this->matchup = $matchup;

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
}
