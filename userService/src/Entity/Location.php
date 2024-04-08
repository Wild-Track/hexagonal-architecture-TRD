<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
#[ApiResource]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    /**
     * @var Collection<int, BaseUser>
     */
    #[ORM\OneToMany(targetEntity: BaseUser::class, mappedBy: 'location')]
    private Collection $baseUsers;

    public function __construct()
    {
        $this->baseUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, BaseUser>
     */
    public function getBaseUsers(): Collection
    {
        return $this->baseUsers;
    }

    public function addBaseUser(BaseUser $baseUser): static
    {
        if (!$this->baseUsers->contains($baseUser)) {
            $this->baseUsers->add($baseUser);
            $baseUser->setLocation($this);
        }

        return $this;
    }

    public function removeBaseUser(BaseUser $baseUser): static
    {
        if ($this->baseUsers->removeElement($baseUser)) {
            // set the owning side to null (unless already changed)
            if ($baseUser->getLocation() === $this) {
                $baseUser->setLocation(null);
            }
        }

        return $this;
    }
}
