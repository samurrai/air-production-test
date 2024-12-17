<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderCreateRequest;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function __construct(private OrderService $service)
    {
    }

    public function index()
    {
        return OrderResource::collection($this->service->get());
    }

    public function show(int $id)
    {
        return new OrderResource($this->service->find($id));
    }

    public function store(OrderCreateRequest $request)
    {
        $data = $this->service->store($request->validated());
        if ($data)
            return new OrderResource($data);

        return abort(500, 'При создании заказа произошла ошибка');
    }

    public function destroy(int $id)
    {
        return response($this->service->delete($id));
    }

    public function returnOrder(int $id)
    {
        return new OrderResource($this->service->returnOrder($id));
    }
    public function payOrder(int $id)
    {
        return new OrderResource($this->service->payOrder($id));
    }
}
