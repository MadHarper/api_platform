<?php

namespace App\Processor;

use ApiPlatform\State\ProcessorInterface;
use ApiPlatform\Metadata\Operation;

class DragonAddTreasuresProcessor implements ProcessorInterface
{
    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        dd($data);
    }
}
