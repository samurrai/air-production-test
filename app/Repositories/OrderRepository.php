<?php


namespace App\Repositories;


use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderRepository implements BaseRepository
{
    public function get(): Collection
    {
        return Order::all();
    }

    public function getById(int $id): Model
    {
        return Order::query()->findOrFail($id);
    }

    public function store(array $data): ?Model
    {
        DB::beginTransaction();
        try {
            $order = Order::query()->create([
                'total_price' => $data['total_price'],
            ]);

            foreach ($data['products'] as $item) {
                ProductOrder::query()->create([
                    'product_count' => $item['product_count'],
                    'product_id' => $item['product_id'],
                    'order_id' => $order->id
                ]);
            }
            DB::commit();

            return $order;
        }
        catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            return null;
        }
    }

    public function updateStatus(int $id, string $status)
    {
        $order = Order::query()->find($id);
        $order->update([
            'status' => $status
        ]);

        return $order;
    }

    public function delete(int $id): void
    {
        Order::query()->findOrFail($id)->delete();
    }
}
