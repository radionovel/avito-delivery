<?php
declare(strict_types=1);


namespace App\Shared\Infrastructure\Models;

use App\Shared\Domain\Entities\Order;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @method static static create(array $attributes)
 */
class OrderModel extends Model
{
    protected $collection = 'orders';
    protected $primaryKey = 'uuid';

    public static function createFromEntity(Order $order): self
    {
        return self::create(
            $order->toArray()
        );
    }
}
