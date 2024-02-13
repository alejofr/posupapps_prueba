<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba PHP - Publicaciones</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/auth.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto" style="max-width: 90%;">
        <div class="d-flex align-items-center flex-row justify-content-between mb-4">
            <a class="btn btn-danger" href="/logout" role="button">Cerrar Sesion</a>
            <a class="btn btn-primary" href="/add-publication" role="button">Agregar</a>
        </div>
        <table class="table mb-4">
            <thead>
                <tr>
                    <th scope="col" style="width:20%;text-align: center;">Titulo</th>
                    <th scope="col" style="width: 35%;text-align: center;">Contenido</th>
                    <th scope="col" style="width:15%;text-align: center;">Autor</th>
                    <th scope="col" style="width:15%;text-align: center;">Fecha</th>
                    <th scope="col" style="width:15%;"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($data as $key => $value) {
                ?>
                    <tr style="vertical-align: middle;">
                        <td style="text-align: center;"><?=$value['titulo'] ?></td>
                        <td><?=$value['contenido'] ?></td>
                        <td style="text-align: center;"><?=$value['autor'] ?></td>
                        <td style="text-align: center;"><?=$value['fecha_publicacion'] ?></td>
                        <td>
                            <div class="d-flex align-items-center flex-row">
                                <a class="btn btn-primary me-2" href="/publications/<?=$value['id']; ?>/edit" role="button">Edit</a>
                                <a class="btn btn-danger me-2" href="/publications/<?=$value['id']; ?>/delete" role="button">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
        <div class="d-flex align-items-center flex-row justify-content-between mb-4">
            <div></div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $pagination['page'] > 1 ? "/publications?page=".$pagination['page'] - 1 : "javascript:void()"?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                        <?php 
                            for ($i=1; $i <= $pagination['last_page'] ; $i++) { 
                                if( $i <= 6 ){
                        ?>
                            <li class="page-item"><a class="page-link" href="/publications?page=<?=$i ?>"><?=$i ?></a></li>
                        <?php 
                                }
                            }   
                        ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $pagination['page'] < $pagination['last_page'] ? "/publications?page=".$pagination['page'] + 1 : "javascript:void()"?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>
</body>
</html>