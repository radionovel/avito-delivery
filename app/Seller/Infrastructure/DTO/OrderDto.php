<?php
declare(strict_types=1);


namespace App\Seller\Infrastructure\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class OrderDto extends DataTransferObject
{
    public string $user;
    public string $product;
    public string $destination;
}
