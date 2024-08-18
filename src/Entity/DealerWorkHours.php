<?php

namespace App\Entity;

use App\Repository\DealerWorkHoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DealerWorkHoursRepository::class)]
class DealerWorkHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $monday_open = null;

    #[ORM\Column(length: 255)]
    private ?string $dealer_title = null;

    public function getDealerTitle(): ?string
    {
        return $this->dealer_title;
    }

    public function setDealerTitle(?string $dealer_title): void
    {
        $this->dealer_title = $dealer_title;
    }

    #[ORM\Column(length: 255)]
    private ?string $monday_close = null;

    #[ORM\Column(length: 255)]
    private ?string $tuesday_open = null;

    #[ORM\Column(length: 255)]
    private ?string $tuesday_close = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMondayOpen(): ?string
    {
        return $this->monday_open;
    }

    public function setMondayOpen(string $monday_open): static
    {
        $this->monday_open = $monday_open;

        return $this;
    }

    public function getMondayClose(): ?string
    {
        return $this->monday_close;
    }

    public function setMondayClose(string $monday_close): static
    {
        $this->monday_close = $monday_close;

        return $this;
    }

    public function getTuesdayOpen(): ?string
    {
        return $this->tuesday_open;
    }

    public function setTuesdayOpen(string $tuesday_open): static
    {
        $this->tuesday_open = $tuesday_open;

        return $this;
    }

    public function getTuesdayClose(): ?string
    {
        return $this->tuesday_close;
    }

    public function setTuesdayClose(string $tueday_close): static
    {
        $this->tuesday_close = $tueday_close;

        return $this;
    }
}
