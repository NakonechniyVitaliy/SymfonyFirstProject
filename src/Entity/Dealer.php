<?php

namespace App\Entity;

use App\Repository\DealerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DealerRepository::class)]
class Dealer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Name = null;


    #[ORM\OneToOne(targetEntity: DealerWorkHours::class)]
    #[ORM\JoinColumn(name: 'work_hour_id', referencedColumnName: 'id')]
    private DealerWorkHours|null $dealerWorkHours = null;

    public function getDealerWorkHours(): ?DealerWorkHours
    {
        return $this->dealerWorkHours;
    }

    public function setDealerWorkHours(?DealerWorkHours $dealerWorkHours): void
    {
        $this->dealerWorkHours = $dealerWorkHours;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }
}
