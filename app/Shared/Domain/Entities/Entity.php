<?php
declare(strict_types=1);


namespace App\Shared\Domain\Entities;

use JsonSerializable;


class Entity implements JsonSerializable
{
    /**
     * @return array|string
     */
    public function jsonSerialize(): array|string
    {
        if (method_exists($this, 'toArray')) {
            return $this->toArray();
        }

        if (method_exists($this, '__toString')) {
            return $this->__toString();
        }

        return '';
    }
}
