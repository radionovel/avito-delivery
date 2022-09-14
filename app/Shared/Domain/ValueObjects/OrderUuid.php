<?php
declare(strict_types=1);


namespace App\Shared\Domain\ValueObjects;

use InvalidArgumentException;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class OrderUuid
{
    /**
     * @param UuidInterface $uuid
     */
    private function __construct(protected UuidInterface $uuid)
    {
    }

    /**
     * @param string $id
     * @return static
     */
    public static function fromString(string $id): static
    {
        try {
            return new static(Uuid::fromString($id));
        } catch (InvalidUuidStringException $exception) {
            throw new InvalidArgumentException($id);
        }
    }

    /**
     * @return static
     */
    public static function next(): static
    {
        return new static(Uuid::uuid4());
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->uuid->toString();
    }

    /**
     * @param OrderUuid $uuid
     * @return bool
     */
    public function equalTo(OrderUuid $uuid): bool
    {
        return $this->value() === $uuid->value();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value();
    }
}
