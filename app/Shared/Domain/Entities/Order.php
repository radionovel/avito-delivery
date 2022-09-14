<?php
declare(strict_types=1);


namespace App\Shared\Domain\Entities;

use App\Shared\Domain\ValueObjects\OrderUuid;

class Order extends Entity
{
    protected OrderUuid $uuid;
    protected string $product;
    protected Delivery $delivery;

    /**
     * @param OrderUuid $uuid
     * @param string $product
     * @param Delivery $delivery
     */
    public function __construct(OrderUuid $uuid, string $product, Delivery $delivery)
    {
        $this->uuid = $uuid;
        $this->product = $product;
        $this->delivery = $delivery;
    }

    /**
     * @return OrderUuid
     */
    public function getUuid(): OrderUuid
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product;
    }

    /**
     * @return Delivery
     */
    public function getDelivery(): Delivery
    {
        return $this->delivery;
    }

    /**
     * @param string $product
     * @param Delivery $delivery
     * @return Order
     */
    public static function createFromPrimitives(string $product, Delivery $delivery): Order
    {
        return new self(OrderUuid::next(), $product, $delivery);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'uuid' => $this->getUuid(),
            'product' => $this->getProduct(),
            'delivery' => $this->getDelivery(),
        ];
    }
}
