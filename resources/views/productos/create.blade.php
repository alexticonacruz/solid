<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>

<body>
    <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio">

        <label for="archivo">Archivo (Imagen o PDF):</label>
        <input type="file" name="archivo" id="archivo">

        <button type="submit">Guardar</button>
    </form>
</body>

</html>
