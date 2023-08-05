<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Dto\Dragon\DragonDto;
use App\Processor\DragonAddTreasuresProcessor;
use App\Repository\DragonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new GetCollection(),
        new Get(),
        new Post(),
        new Put(),
        new Patch(),
        new Post(
            uriTemplate: '/dragons/add_treasures',
            denormalizationContext: ['groups' => [DragonDto::GROUP_CREATE]],
            input: DragonDto::class,
            output: false,
//            processor: DragonAddTreasuresProcessor::class,
            messenger: true,
            name: self::ROUTE_ADD_TREASURES,
        ),
    ],
    normalizationContext: ['groups' => self::GROUP_READ],
)]
#[ORM\Entity(repositoryClass: DragonRepository::class)]
class Dragon
{
    public const GROUP_READ = 'group:read';
    public const ROUTE_ADD_TREASURES = 'route:add_treasures';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[ApiProperty(identifier: true)]
    #[Groups([self::GROUP_READ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[ApiProperty]
    #[Groups([self::GROUP_READ])]
    private ?string $name = null;

    #[ORM\Column]
    #[ApiProperty]
    #[Groups([self::GROUP_READ])]
    private ?int $age = null;

    #[ORM\OneToMany(mappedBy: 'dragon', targetEntity: DragonTreasure::class)]
    #[ApiProperty]
    #[Groups([self::GROUP_READ])]
    private Collection $dragonTreasures;

    public function __construct()
    {
        $this->dragonTreasures = new ArrayCollection();
    }

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection<int, DragonTreasure>
     */
    public function getDragonTreasures(): Collection
    {
        return $this->dragonTreasures;
    }

    public function addDragonTreasure(DragonTreasure $dragonTreasure): static
    {
        if (!$this->dragonTreasures->contains($dragonTreasure)) {
            $this->dragonTreasures->add($dragonTreasure);
            $dragonTreasure->setDragon($this);
        }

        return $this;
    }

    public function removeDragonTreasure(DragonTreasure $dragonTreasure): static
    {
        if ($this->dragonTreasures->removeElement($dragonTreasure)) {
            // set the owning side to null (unless already changed)
            if ($dragonTreasure->getDragon() === $this) {
                $dragonTreasure->setDragon(null);
            }
        }

        return $this;
    }
}
