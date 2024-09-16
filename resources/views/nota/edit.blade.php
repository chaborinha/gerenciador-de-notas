<!-- resources/views/lista/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Nota</h1>

        <form action="{{ route('nota.update', $nota->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $nota->titulo) }}" required>
            </div>

            <div class="form-group mt-2">
                <label for="conteudo">Conteúdo</label>
                <textarea name="conteudo" id="conteudo" class="form-control" required>{{ old('conteudo', $nota->conteudo) }}</textarea>
            </div>

            

            <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>