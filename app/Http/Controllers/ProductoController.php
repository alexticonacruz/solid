<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductoInterface;
use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{


    private ProductoInterface $productoRepository;

    public function __construct(ProductoInterface $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function index()
    {
        $productos = $this->productoRepository->allProductos();

        return view('productos.index', compact('productos'));
    }


    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        return view('productos.create');
    }
    public function store(Request  $request)
    {
        $producto = new Producto();
        $producto->fill($request->except('archivo')); // Excluye 'archivo'

        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $rutaArchivo = $archivo->storeAs('uploads', $nombreArchivo, 'public'); // Guarda el archivo
            $producto->ruta_archivo = $rutaArchivo; // Guarda la ruta
        }

        $this->productoRepository->createProducto($producto);

        return redirect()->route('producto.index');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
