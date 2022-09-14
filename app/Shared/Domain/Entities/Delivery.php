<?php
declare(strict_types=1);


namespace App\Shared\Domain\Entities;

class Delivery extends Entity
{
    /**
     * @param string $destination
     * @param \DateTimeImmutable $date
     * @param float $cost
     */
    public function __construct(protected string $destination, protected \DateTimeImmutable $date, protected float $cost)
    {
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'date' => $this->getDate(),
            'cost' => $this->getCost(),
            'destination' => $this->getDestination(),
        ];
    }
}
