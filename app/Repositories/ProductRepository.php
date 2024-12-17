<?php


namespace App\Repositories;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements BaseRepository
{
    public function get(): Collection
    {
        return Product::all();
    }

    public function getById(int $id): Model
    {
        return Product::query()->findOrFail($id);
    }

    public function store(array $data): ?Model
    {
        return Product::query()->create($data);
    }

    public function update(int $id, array $data): ?Model
    {
        $product = Product::query()->findOrFail($id);
        $product->update($data);

        return $product;
    }

    public function delete(int $id): void
    {
        Product::query()->find($id)->delete();
    }

    public function getTotalPrice(array $products): int
    {
        $totalPrice = 0;

        foreach ($products as $product)
            $totalPrice += Product::query()->find($product['product_id'])->price * $product['product_count'];

        return $totalPrice;
    }
}
