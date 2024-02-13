<?php

namespace App\Entity;

use App\Repository\MainRolesRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: MainRolesRepository::class)]
class MainRoles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

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

      // ...

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="mainRole")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    // ...
}
