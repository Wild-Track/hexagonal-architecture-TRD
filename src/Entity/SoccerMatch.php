<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Enum\PlayStage;
use ApiPlatform\Metadata\ApiResource;
use App\Enum\StatusMatch;
use App\Infrastructure\Persistence\Doctrine\ValueObject\WinnerType;
use App\Repository\SoccerMatchRepository;
use App\State\SoccerMatchProcessor;
use App\ValueObject\Winner;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SoccerMatchRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['soccerMatch']]
)]
#[ApiFilter(
    SearchFilter::class, properties: ['playStage' => 'exact']
)]
class SoccerMatch
{
    #[Groups(['soccerMatch'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['soccerMatch'])]
    #[ORM\ManyToOne(inversedBy: 'soccerMatches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SoccerTeam $homeTeam = null;

    #[Groups(['soccerMatch'])]
    #[ORM\ManyToOne(inversedBy: 'soccerMatches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SoccerTeam $awayTeam = null;

    #[Groups(['soccerMatch'])]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDateTime = null;

    #[Groups(['soccerMatch'])]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDateTime = null;

    #[Groups(['soccerMatch'])]
    #[ORM\Column(length: 255)]
    private ?string $playStage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statusMatch = null;

    #[ORM\ManyToOne]
    private ?SoccerTeam $winnerSoccerTeam = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?SoccerVenue $venue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHomeTeam(): ?SoccerTeam
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(?SoccerTeam $homeTeam): static
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    public function getAwayTeam(): ?SoccerTeam
    {
        return $this->awayTeam;
    }

    public function setAwayTeam(?SoccerTeam $awayTeam): static
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    public function getStartDateTime(): ?\DateTimeInterface
    {
        return $this->startDateTime;
    }

    public function setStartDateTime(\DateTimeInterface $startDateTime): static
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getEndDateTime(): ?\DateTimeInterface
    {
        return $this->endDateTime;
    }

    public function setEndDateTime(\DateTimeInterface $endDateTime): static
    {
        $this->endDateTime = $endDateTime;

        return $this;
    }

    public function getPlayStage(): ?string
    {
        return $this->playStage;
    }

    public function setPlayStage(string $playStage): static
    {
        if (!in_array($playStage, PlayStage::values())) {
            throw new \InvalidArgumentException("Invalid play stage.");
        }

        $this->playStage = $playStage;

        return $this;
    }

    public function getStatusMatch(): ?string
    {
        return $this->statusMatch;
    }

    public function setStatusMatch(?string $statusMatch): static
    {
        if (!in_array($statusMatch, StatusMatch::values())) {
            throw new \InvalidArgumentException("Invalid status match.");
        }

        $this->statusMatch = $statusMatch;

        return $this;
    }

    public function getWinnerSoccerTeam(): ?SoccerTeam
    {
        return $this->winnerSoccerTeam;
    }

    public function setWinnerSoccerTeam(?SoccerTeam $winnerSoccerTeam): static
    {
        $this->winnerSoccerTeam = $winnerSoccerTeam;

        return $this;
    }

    public function getVenue(): ?SoccerVenue
    {
        return $this->venue;
    }

    public function setVenue(?SoccerVenue $venue): static
    {
        $this->venue = $venue;

        return $this;
    }

}
