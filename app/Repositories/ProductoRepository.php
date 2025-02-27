<?php

namespace App\Repositories;

use App\Interfaces\ProductoInterface;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Collection;

class ProductoRepository implements ProductoInterface
{
    /**
     * Create a new class instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    public function allProductos(): Collection
    {
        return Producto::all();
    }

    public function getProductoById(int $idProducto): ?Producto
    {
        return Producto::find($idProducto);
    }

    public function searchProductos(string $searchQuery): Collection
    {
        return Producto::where('nombre', 'like', "%$searchQuery%")->get();
    }

    public function createProducto(Producto $producto): void
    {
        $producto->save();
    }

    public function updateProducto(Producto $producto): void
    {
        $producto->save();
    }

    public function deleteProducto(int $idProducto): void
    {
        Producto::destroy($idProducto);
    }
}
