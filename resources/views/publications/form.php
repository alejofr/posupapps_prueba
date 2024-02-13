<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba PHP - <?php echo $edit ? "Actualizar" : "Agregar" ?> Publicacion</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/publication.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-publication w-100 m-auto">
        <a class="btn btn-primary mb-4" href="/publications" role="button">Volver a publicaciones</a>
        <div class="alert alert-success" role="alert" role="alert" style="display: <?php echo isset($created) ? 'block' : 'none'; ?>">
            <?=$created ?>
        </div>
        <form action="<?php echo $edit ? "/publications/$id": "/publications"; ?>" method="POST">
            <div class="form-floating mb-3">
                <input 
                    type="text" 
                    class="form-control" 
                    id="floatingAutor" 
                    name="titulo" 
                    placeholder=""
                    value="<?php echo isset($titulo) ? $titulo : ""; ?>"
                    required
                >
                <label for="floatingAutor">Titulo</label>
            </div>
            <div class="form-floating mb-3">
                <input 
                    type="text" 
                    class="form-control" 
                    id="floatingAutor" 
                    name="autor" 
                    placeholder=""
                    value="<?php echo isset($autor) ? $autor : ""; ?>"
                    required
                >
                <label for="floatingAutor">Autor</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="contenido" placeholder="" id="floatingTextarea2" style="height: 100px"><?php echo isset($contenido) ? $contenido : ""; ?></textarea>
                <label for="floatingTextarea2">Contenido</label>
            </div>
            <div class="form-floating mb-3">
                <input 
                    type="date" 
                    class="form-control" 
                    id="floatingDate" 
                    name="fecha_publicacion" 
                    placeholder=""
                    value="<?php echo isset($fecha_publicacion) ? $fecha_publicacion : ""; ?>"
                    required
                >
                <label for="floatingDate">Fecha</label>
            </div>
            <br>
            <button class="btn btn-primary w-100 py-2" type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>