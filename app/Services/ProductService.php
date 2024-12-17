<?php


namespace App\Services;


use App\Repositories\ProductRepository;

class ProductService
{
    public function __construct(private ProductRepository $repository)
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
        return $this->repository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);

        return [
            'message' => 'Product successfully deleted'
        ];
    }

    public function getTotalPrice(array $products)
    {
        return $this->repository->getTotalPrice($products);
    }
}
