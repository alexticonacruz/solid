<?php

namespace App\Interfaces;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Collection;

interface ProductoInterface
{
    //
    public function allProductos(): Collection;
    public function getProductoById(int $idProducto): ?Producto;
    public function searchProductos(string $searchQuery): Collection;
    public function createProducto(Producto $producto): void;
    public function updateProducto(Producto $producto): void;
    public function deleteProducto(int $idProducto): void;
}
