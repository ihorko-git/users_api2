<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(enumType: AddressStatusEnum::class)]
    private ?AddressStatusEnum $status = null;

    #[ORM\Column]
    private ?float $balance = null;

    /**
     * Many Addresses have Many Services.
     * @var Collection<int, Service>
     */
    #[JoinTable(name: 'addresses_services')]
    #[JoinColumn(name: 'address_id', referencedColumnName: 'id')]
    #[InverseJoinColumn(name: 'service_id', referencedColumnName: 'id', unique: true)]
    #[ManyToMany(targetEntity: 'Service')]
    private Collection $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
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

    public function getStatus(): ?AddressStatusEnum
    {
        return $this->status;
    }

    public function setStatus(AddressStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): static
    {
        $this->balance = $balance;

        return $this;
    }

    public function getServices(): Collection
    {
        return $this->services;
    }

    public function setServices(array $services): static
    {
        $this->services = new ArrayCollection($services);

        return $this;
    }
}
