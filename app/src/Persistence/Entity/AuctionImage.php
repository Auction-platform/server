<?php

namespace App\Persistence\Entity;

use App\Persistence\Repository\AuctionImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: AuctionImageRepository::class)]
class AuctionImage
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $imageId = null;

    #[ORM\ManyToOne(targetEntity: Auction::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Auction $auctionId = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    public function getId(): ?Uuid
    {
        return $this->imageId;
    }

    public function getAuctionId(): ?Auction
    {
        return $this->auctionId;
    }

    public function setAuctionId(Auction $auctionId): static
    {
        $this->auctionId = $auctionId;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }
}
