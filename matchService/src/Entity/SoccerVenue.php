<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SoccerVenueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoccerVenueRepository::class)]
#[ApiResource]
class SoccerVenue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $venueName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVenueName(): ?string
    {
        return $this->venueName;
    }

    public function setVenueName(string $venueName): static
    {
        $this->venueName = $venueName;

        return $this;
    }
}
