<?php
require __DIR__.'/../../app/controllers/LoginController.php';

$login= new LoginController();
$log = $login->sign();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign!</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/sign.css">
</head>
<body>
    <div class="login-container d-flex justify-content-center align-items-center">
        <div class="login-card">
            <h2 class="text-center">Crea tu cuenta!</h2>
            
            <!-- Switch entre Anfitrión e Inquilino -->
            <div class="switch-container active-inquilino" id="accountSwitch">
                <div class="switch-indicator"></div>
                <div class="switch-button button-inquilino" onclick="selectAccountType('inquilino')">Inquilino</div>
                <div class="switch-button button-anfitrion" onclick="selectAccountType('anfitrion')">Anfitrión</div>
            </div>

            <!-- Formulario de registro -->
            <form method="POST">
                <input type="hidden" name="tipo" id="tipoCuenta" value="inquilino">
                <div class="form-group mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="telefono">Telefono</label>
                    <input type="number" id="telefono" name="telefono" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <input type="hidden" id="accountType" name="accountType" value="inquilino">
                <button type="submit" name="signup" class="btn btn-primary w-100">Crear Cuenta</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript para cambiar el tipo de cuenta -->
    <script>
        function selectAccountType(type) {
            const switchContainer = document.getElementById('accountSwitch');
            const tipoCuentaInput = document.getElementById('tipoCuenta');

            tipoCuentaInput.value = type;
            
            if (type === 'inquilino') {
                switchContainer.classList.add('active-inquilino');
                switchContainer.classList.remove('active-anfitrion');
            } else {
                switchContainer.classList.add('active-anfitrion');
                switchContainer.classList.remove('active-inquilino');
            }
        }
    </script>
</body>
</html>