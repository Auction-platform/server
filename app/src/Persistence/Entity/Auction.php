<?php

namespace App\Persistence\Entity;

use App\Persistence\Enums\AuctionStatus;
use App\Persistence\Repository\AuctionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: AuctionRepository::class)]
class Auction
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $auctionId = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $authorId = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private ?User $winnerId = null;

    #[ORM\ManyToOne(targetEntity: Category::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $categoryId = null;

    #[ORM\Column(length: 64)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $startPrice = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $currentPrice = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $buyNowPrice = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column(enumType: AuctionStatus::class)]
    private ?AuctionStatus $status = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    public function getId(): ?Uuid
    {
        return $this->auctionId;
    }

    public function getAuthorId(): ?User
    {
        return $this->authorId;
    }

    public function setAuthorId(User $authorId): static
    {
        $this->authorId = $authorId;

        return $this;
    }

    public function getWinnerId(): ?User
    {
        return $this->winnerId;
    }

    public function setWinnerId(?User $winnerId): static
    {
        $this->winnerId = $winnerId;

        return $this;
    }

    public function getCategoryId(): ?Category
    {
        return $this->categoryId;
    }

    public function setCategoryId(Category $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStartPrice(): ?string
    {
        return $this->startPrice;
    }

    public function setStartPrice(string $startPrice): static
    {
        $this->startPrice = $startPrice;

        return $this;
    }

    public function getCurrentPrice(): ?string
    {
        return $this->currentPrice;
    }

    public function setCurrentPrice(string $currentPrice): static
    {
        $this->currentPrice = $currentPrice;

        return $this;
    }

    public function getBuyNowPrice(): ?string
    {
        return $this->buyNowPrice;
    }

    public function setBuyNowPrice(?string $buyNowPrice): static
    {
        $this->buyNowPrice = $buyNowPrice;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getStatus(): ?AuctionStatus
    {
        return $this->status;
    }

    public function setStatus(AuctionStatus $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
