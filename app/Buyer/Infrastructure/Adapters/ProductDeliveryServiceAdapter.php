<?php
declare(strict_types=1);


namespace App\Buyer\Infrastructure\Adapters;

use App\Buyer\Infrastructure\DTO\DeliveryDto;
use App\Shared\Application\Services\DeliveryService;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ProductDeliveryServiceAdapter
{
    /**
     * @param DeliveryService $deliveryService
     */
    public function __construct(private readonly DeliveryService $deliveryService)
    {
    }

    /**
     * @throws UnknownProperties
     */
    public function calculate(string $product, string $destination): DeliveryDto
    {
        $delivery = $this->deliveryService->calculate($product, $destination);

        return new DeliveryDto([
            'cost' => $delivery->getCost()
        ]);
    }
}
