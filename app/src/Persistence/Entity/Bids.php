<?php

namespace App\Persistence\Entity;

use App\Persistence\Repository\BidsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: BidsRepository::class)]
class Bids
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $bidId = null;

    #[ORM\Column(type: 'uuid')]
    private ?Uuid $auctionId = null;

    #[ORM\Column(type: 'uuid')]
    private ?Uuid $userId = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $amount = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $time = null;

    public function getId(): ?Uuid
    {
        return $this->bidId;
    }

    public function getAuctionId(): ?Uuid
    {
        return $this->auctionId;
    }

    public function setAuctionId(Uuid $auctionId): static
    {
        $this->auctionId = $auctionId;

        return $this;
    }

    public function getUserId(): ?Uuid
    {
        return $this->userId;
    }

    public function setUserId(Uuid $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): static
    {
        $this->time = $time;

        return $this;
    }
}
