<?php
declare(strict_types=1);


namespace App\Buyer\Infrastructure\Adapters;

use App\Shared\Application\Services\DeliveryService;
use App\Shared\Domain\Entities\Order;
use App\Shared\Domain\Repositories\OrderRepositoryInterface;

class OrderRepositoryAdapter
{
    private OrderRepositoryInterface $orderRepository;
    private DeliveryService $deliveryService;

    /**
     * @param OrderRepositoryInterface $orderRepository
     * @param DeliveryService $deliveryService
     */
    public function __construct(OrderRepositoryInterface $orderRepository, DeliveryService $deliveryService)
    {
        $this->orderRepository = $orderRepository;
        $this->deliveryService = $deliveryService;
    }

    /**
     * @param $product
     * @param $destination
     * @return string
     */
    public function create($product, $destination): string
    {
        $delivery = $this->deliveryService->calculate($product, $destination);
        return $this->orderRepository->add(
            Order::createFromPrimitives($product, $delivery)
        );
    }
}
