<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BettorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BettorRepository::class)]
#[ApiResource]
class Bettor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'bettor', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?BaseUser $baseUser = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column]
    private array $wager = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBaseUser(): ?BaseUser
    {
        return $this->baseUser;
    }

    public function setBaseUser(BaseUser $baseUser): static
    {
        $this->baseUser = $baseUser;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getWager(): array
    {
        return $this->wager;
    }

    public function setWager(array $wager): static
    {
        $this->wager = $wager;

        return $this;
    }

}
