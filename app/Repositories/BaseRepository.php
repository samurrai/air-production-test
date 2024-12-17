<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

interface BaseRepository
{
    public function get(): Collection;
    public function getById(int $id): Model;
    public function store(array $data): ?Model;
    public function delete(int $id): void;
}
