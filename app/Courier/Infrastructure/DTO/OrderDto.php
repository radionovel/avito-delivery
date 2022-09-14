<?php
declare(strict_types=1);


namespace App\Courier\Infrastructure\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class OrderDto extends DataTransferObject
{
    public string $product;
    public string $destination;
    public string $deliveryTime;
}
