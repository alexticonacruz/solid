<!DOCTYPE html>
<html>

<head>
    <title>Lista de productos</title>
</head>

<body>
    <a href="{{ route('producto.create') }}">Crear new product</a>
    <h1>Lista de productos</h1>
    {{-- ---------------------------------------------------------------------------------------- --}}
    @foreach ($productos as $producto)
        {{-- recuerda comentar los valores que no van a usar --}}


        {{-- para mostrar imagenes  --}}
        @if ($producto->ruta_archivo)
            <img src="{{ asset('storage/' . $producto->ruta_archivo) }}" style="width: 350px" alt="Imagen del producto">
            <br>
        @else
            <p>No hay imagen disponible.</p>
        @endif
        {{-- Codigo para descarga de un archivo ideal para descargar los reportes guardados --}}
        @if ($producto->ruta_archivo)
            <a href="{{ asset('storage/' . $producto->ruta_archivo) }}" download>Descargar archivo</a>
        @else
            <p>No hay archivo disponible.</p>
        @endif
        {{-- para mostrar un documento sin descargar --}}
        @if ($producto->ruta_archivo)
            <iframe src="{{ asset('storage/' . $producto->ruta_archivo) }}" width="600" height="400"></iframe>
        @else
            <p>No hay PDF disponible.</p>
        @endif
    @endforeach

     {{-- ---------------------------------------------------------------------------------------- --}}
    @if ($productos->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Ruta del archivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->precio }}</td>
                        <td>{{ $item->ruta_archivo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay productos disponibles.</p>
    @endif

    <script>
        console.log("Datos de productos (Collection):", @json($productos));

        @if ($productos->isNotEmpty())
            var productosJS = @json($productos);
            productosJS.forEach(producto => {
                console.log("Producto (JS):", producto.nombre, producto.precio);
            });
        @endif
    </script>
</body>

</html>
