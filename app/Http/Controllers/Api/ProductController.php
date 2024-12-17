<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(private ProductService $service)
    {
    }

    public function index()
    {
        return ProductResource::collection($this->service->get());
    }

    public function show(int $id)
    {
        return new ProductResource($this->service->find($id));
    }

    public function store(ProductCreateRequest $request)
    {
        return new ProductResource($this->service->store($request->validated()));
    }

    public function update(int $id, ProductUpdateRequest $request)
    {
        return new ProductResource($this->service->update($id, $request->validated()));
    }

    public function destroy(int $id)
    {
        return response($this->service->delete($id));
    }
}
