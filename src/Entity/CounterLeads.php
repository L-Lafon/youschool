<?php

namespace App\Entity;

use App\Repository\CounterLeadsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CounterLeadsRepository::class)]
class CounterLeads
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(targetEntity: Source::class, cascade: ['persist', 'remove'])]
    private $source;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\Column(type: 'integer')]
    private $count_total;

    #[ORM\Column(type: 'integer')]
    private $count_client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSource(): ?Source
    {
        return $this->source;
    }

    public function setSource(?Source $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCountTotal(): ?int
    {
        return $this->count_total;
    }

    public function setCountTotal(int $count_total): self
    {
        $this->count_total = $count_total;

        return $this;
    }

    public function getCountClient(): ?int
    {
        return $this->count_client;
    }

    public function setCountClient(int $count_client): self
    {
        $this->count_client = $count_client;

        return $this;
    }
}
