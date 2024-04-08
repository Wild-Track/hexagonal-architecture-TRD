<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SoccerTeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SoccerTeamRepository::class)]
#[ApiResource]
class SoccerTeam
{
    #[Groups(['soccerMatch'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['soccerMatch'])]
    #[ORM\Column(length: 255)]
    private ?string $teamName = null;

    #[Groups(['soccerMatch'])]
    #[ORM\Column(length: 255)]
    private ?string $teamGroup = null;

    /**
     * @var Collection<int, SoccerMatch>
     */
    #[ORM\OneToMany(targetEntity: SoccerMatch::class, mappedBy: 'homeTeam')]
    private Collection $soccerMatches;

    public function __construct()
    {
        $this->soccerMatches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamName(): ?string
    {
        return $this->teamName;
    }

    public function setTeamName(string $teamName): static
    {
        $this->teamName = $teamName;

        return $this;
    }

    public function getTeamGroup(): ?string
    {
        return $this->teamGroup;
    }

    public function setTeamGroup(string $teamGroup): static
    {
        $this->teamGroup = $teamGroup;

        return $this;
    }

    /**
     * @return Collection<int, SoccerMatch>
     */
    public function getSoccerMatches(): Collection
    {
        return $this->soccerMatches;
    }

    public function addSoccerMatch(SoccerMatch $soccerMatch): static
    {
        if (!$this->soccerMatches->contains($soccerMatch)) {
            $this->soccerMatches->add($soccerMatch);
            $soccerMatch->setHomeTeam($this);
        }

        return $this;
    }

    public function removeSoccerMatch(SoccerMatch $soccerMatch): static
    {
        if ($this->soccerMatches->removeElement($soccerMatch)) {
            // set the owning side to null (unless already changed)
            if ($soccerMatch->getHomeTeam() === $this) {
                $soccerMatch->setHomeTeam(null);
            }
        }

        return $this;
    }
}
