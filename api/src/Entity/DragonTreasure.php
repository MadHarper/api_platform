<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use App\Dto\Dragon\DragonDto;
use App\Repository\DragonTreasureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    normalizationContext: ['groups' => self::GROUP_READ],
    denormalizationContext: ['groups' => self::GROUP_WRITE],
)]
#[ORM\Entity(repositoryClass: DragonTreasureRepository::class)]
class DragonTreasure
{
    const GROUP_READ = 'group_read';
    const GROUP_WRITE = 'group_write';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[ApiProperty(identifier: true)]
    #[Groups([self::GROUP_READ, self::GROUP_WRITE])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[ApiProperty]
    #[Groups([self::GROUP_READ, self::GROUP_WRITE])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[ApiProperty]
    #[Groups([self::GROUP_READ, self::GROUP_WRITE])]
    private ?string $description = null;

    #[ORM\Column]
    #[ApiProperty]
    #[Groups([self::GROUP_READ, self::GROUP_WRITE])]
    private ?int $value = null;

    #[ORM\Column]
    #[ApiProperty]
    #[Groups([self::GROUP_READ, self::GROUP_WRITE])]
    private ?int $coolFactor = null;

    #[ORM\Column]
    #[ApiProperty]
    #[Groups([self::GROUP_READ, self::GROUP_WRITE])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[ApiProperty]
    #[Groups([self::GROUP_READ])]
    private ?bool $isPublished = null;

    #[ORM\ManyToOne(inversedBy: 'dragonTreasures')]
    #[ApiProperty]
    #[Groups([self::GROUP_READ])]
    private ?Dragon $dragon = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getCoolFactor(): ?int
    {
        return $this->coolFactor;
    }

    public function setCoolFactor(int $coolFactor): static
    {
        $this->coolFactor = $coolFactor;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getDragon(): ?Dragon
    {
        return $this->dragon;
    }

    public function setDragon(?Dragon $dragon): static
    {
        $this->dragon = $dragon;

        return $this;
    }
}
