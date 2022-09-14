<?php
declare(strict_types=1);


namespace App\Buyer\Application\Controllers;

use App\Buyer\Infrastructure\Adapters\OrderRepositoryAdapter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController
{
    public function create(Request $request, OrderRepositoryAdapter $repository): JsonResponse
    {
        $orderId = $repository->create($request->product, $request->destination);
        return new JsonResponse([
            'id' => $orderId
        ]);
    }
}
