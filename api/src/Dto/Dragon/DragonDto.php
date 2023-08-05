<?php

namespace App\Dto\Dragon;

use ApiPlatform\Metadata\ApiProperty;
use App\Entity\Dragon;
use App\Entity\DragonTreasure;
use Symfony\Component\Serializer\Annotation\Groups;

class DragonDto
{
    // группы называются по круту
    // Название_сущности:операция
    public const GROUP_CREATE = 'DragonDto:create';

    public function __construct(
        /** @var DragonTreasure[] */
        #[ApiProperty]
        #[Groups([self::GROUP_CREATE])]
        public array $dragonTreasures,
        #[ApiProperty]
        #[Groups([self::GROUP_CREATE])]
        public Dragon $dragon,
    )
    {
    }
}
