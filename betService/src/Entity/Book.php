<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $bookmakerId = null;

    #[ORM\Column]
    private ?int $matchId = null;

    #[ORM\Column]
    private ?float $odds = null;

    /**
     * @var Collection<int, Bet>
     */
    #[ORM\ManyToMany(targetEntity: Bet::class, mappedBy: 'books')]
    private Collection $bets;

    public function __construct()
    {
        $this->bets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookmakerId(): ?int
    {
        return $this->bookmakerId;
    }

    public function setBookmakerId(int $bookmakerId): static
    {
        $this->bookmakerId = $bookmakerId;

        return $this;
    }

    public function getMatchId(): ?int
    {
        return $this->matchId;
    }

    public function setMatchId(int $matchId): static
    {
        $this->matchId = $matchId;

        return $this;
    }

    public function getOdds(): ?float
    {
        return $this->odds;
    }

    public function setOdds(float $odds): static
    {
        $this->odds = $odds;

        return $this;
    }

    /**
     * @return Collection<int, Bet>
     */
    public function getBets(): Collection
    {
        return $this->bets;
    }

    public function addBet(Bet $bet): static
    {
        if (!$this->bets->contains($bet)) {
            $this->bets->add($bet);
            $bet->addBook($this);
        }

        return $this;
    }

    public function removeBet(Bet $bet): static
    {
        if ($this->bets->removeElement($bet)) {
            $bet->removeBook($this);
        }

        return $this;
    }
}
