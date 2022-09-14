<?php
declare(strict_types=1);


namespace App\Shared\Application\Services;

use App\Shared\Domain\Entities\Delivery;
use Carbon\Carbon;

class DeliveryService
{
    public function calculate(string $product, string $destination): Delivery
    {
        return new Delivery($destination, Carbon::now()->format('Y-m-d H:i:s'), 200.);
    }
}
