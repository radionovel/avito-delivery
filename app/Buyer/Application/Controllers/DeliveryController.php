<?php
declare(strict_types=1);


namespace App\Buyer\Application\Controllers;

use App\Buyer\Infrastructure\Adapters\ProductDeliveryServiceAdapter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DeliveryController extends Controller
{
    /**
     * @param Request $request
     * @param ProductDeliveryServiceAdapter $deliveryService
     * @return JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function calculate(Request $request, ProductDeliveryServiceAdapter $deliveryService): JsonResponse
    {
        $delivery = $deliveryService->calculate($request->product, $request->destination);
        return new JsonResponse($delivery);
    }
}
