<?php

namespace App\Persistence\Entity;

use App\Persistence\Repository\AuctionImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: AuctionImagesRepository::class)]
class AuctionImages
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $imageId = null;

    #[ORM\Column(type: 'uuid')]
    private ?Uuid $auctionId = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    public function getId(): ?Uuid
    {
        return $this->imageId;
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
