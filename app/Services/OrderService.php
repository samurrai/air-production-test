<?php


namespace App\Services;


use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderService
{
    public function __construct(private OrderRepository $repository, private ProductService $productService)
    {
    }

    public function get()
    {
        return $this->repository->get();
    }

    public function find(int $id)
    {
        return $this->repository->getById($id);
    }

    public function store(array $data)
    {
        $data['total_price'] = $this->productService->getTotalPrice($data['products']);
        return $this->repository->store($data);
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);

        return [
            'message' => 'Order successfully deleted'
        ];
    }

    public function returnOrder(int $id)
    {
        return $this->repository->updateStatus($id, Order::RETURNED);
    }
    public function payOrder(int $id)
    {
        return $this->repository->updateStatus($id, Order::PAID);
    }
}
