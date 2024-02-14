<?php

namespace App\Entity;

use App\Repository\PeopleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeopleRepository::class)]
class People
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $surname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_birth = null;

    #[ORM\Column(length: 50)]
    private ?string $place_birth = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): static
    {
        $this->surname = $surname;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->date_birth;
    }

    public function setDateBirth(\DateTimeInterface $date_birth): static
    {
        $this->date_birth = $date_birth;

        return $this;
    }

    public function getPlaceBirth(): ?string
    {
        return $this->place_birth;
    }

    public function setPlaceBirth(string $place_birth): static
    {
        $this->place_birth = $place_birth;

        return $this;
    }
}
