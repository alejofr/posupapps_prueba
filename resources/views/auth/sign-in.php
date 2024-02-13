<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba PHP - Iniciar Sesión</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/auth.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form action="/sign-in" method="POST">
            <div class="alert alert-danger" role="alert" style="display: <?php echo isset($error) ? 'block' : 'none'; ?>">
                <?=$error ?>
            </div>
            <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>
            <div class="form-floating">
                <input 
                    type="email" 
                    class="form-control" 
                    id="floatingInput" 
                    name="email" 
                    placeholder="name@example.com" 
                    value="<?php echo isset($email) ? $email : ""; ?>"
                >
                <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="form-floating">
                <input 
                    type="password" 
                    class="form-control" 
                    id="floatingPassword" 
                    name="password" 
                    placeholder="Password"
                    value="<?php echo isset($password) ? $password : ""; ?>"
                >
                <label for="floatingPassword">Contraseña</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Ingresar</button>
        </form>
    </main>
</body>
</html>