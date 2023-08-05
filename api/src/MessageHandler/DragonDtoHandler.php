<?php

namespace App\MessageHandler;

use App\Dto\Dragon\DragonDto;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class DragonDtoHandler
{
    public function __invoke(DragonDto $dto): void
    {
        dd($dto);
    }
}
