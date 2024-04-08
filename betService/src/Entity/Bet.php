<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BetRepository::class)]
#[ApiResource]
class Bet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, book>
     */
    #[ORM\ManyToMany(targetEntity: book::class, inversedBy: 'bets')]
    private Collection $books;

    #[ORM\Column]
    private ?float $wager = null;

    #[ORM\Column(nullable: true)]
    private ?float $totalGain = null;

    #[ORM\Column]
    private ?float $totalOdds = null;

    #[ORM\Column]
    private ?float $betStatus = null;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(book $book): static
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
        }

        return $this;
    }

    public function removeBook(book $book): static
    {
        $this->books->removeElement($book);

        return $this;
    }

    public function getWager(): ?float
    {
        return $this->wager;
    }

    public function setWager(float $wager): static
    {
        $this->wager = $wager;

        return $this;
    }

    public function getTotalGain(): ?float
    {
        return $this->totalGain;
    }

    public function setTotalGain(float $totalGain): static
    {
        $this->totalGain = $totalGain;

        return $this;
    }

    public function getTotalOdds(): ?float
    {
        return $this->totalOdds;
    }

    public function setTotalOdds(float $totalOdds): static
    {
        $this->totalOdds = $totalOdds;

        return $this;
    }

    public function getBetStatus(): ?float
    {
        return $this->betStatus;
    }

    public function setBetStatus(float $betStatus): static
    {
        $this->betStatus = $betStatus;

        return $this;
    }
}
