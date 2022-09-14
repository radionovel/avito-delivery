<?php

namespace App\Shared\Domain\Repositories;

use App\Shared\Domain\Entities\Order;
use App\Shared\Domain\ValueObjects\OrderUuid;

interface OrderRepositoryInterface
{
    public function add(Order $order);
    public function list(int $page = 1);
    public function find(OrderUuid $uuid): Order;
}
