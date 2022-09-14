<?php
declare(strict_types=1);


namespace App\Buyer\Infrastructure\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class DeliveryDto extends DataTransferObject
{
    public float $cost;
}
