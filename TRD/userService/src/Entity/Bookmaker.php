<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookmakerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookmakerRepository::class)]
#[ApiResource]
class Bookmaker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?BaseUser $baseUser = null;

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
}
