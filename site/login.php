<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container d-flex justify-content-center align-items-center">
        <div class="login-card">
            <h2 class="text-center">Bienvenido!</h2>
            <p class="text-center">Porfavor Ingresa tu cuenta</p>
            <form action="ruta_del_login" method="POST">
                <input type="hidden" name="_token" value="tu_token_csrf_aqui">
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <p class="text-center mt-3">Don't have an account? <a href="#">Sign Up</a></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
