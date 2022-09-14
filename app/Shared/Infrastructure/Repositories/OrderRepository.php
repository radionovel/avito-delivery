<?php
declare(strict_types=1);


namespace App\Shared\Infrastructure\Repositories;

use App\Shared\Domain\Entities\Delivery;
use App\Shared\Domain\Entities\Order;
use App\Shared\Domain\Exceptions\OrderNotFoundException;
use App\Shared\Domain\Repositories\OrderRepositoryInterface;
use App\Shared\Domain\ValueObjects\OrderUuid;
use App\Shared\Infrastructure\Models\OrderModel;
use Illuminate\Support\Str;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @param Order $order
     * @return OrderUuid
     */
    public function add(Order $order): OrderUuid
    {
        OrderModel::createFromEntity($order);
        return $order->getUuid();
    }

    public function list(int $page = 1)
    {
        return [];
    }

    /**
     * @param OrderUuid $uuid
     * @return Order
     */
    public function find(OrderUuid $uuid): Order
    {
        $order = OrderModel::query()
            ->whereKey($uuid)
            ->firstOr(function(){
                throw new OrderNotFoundException();
            });

        return $order->toEntity();
    }
}
