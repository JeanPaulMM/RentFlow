<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <form action="ruta_del_registro" method="POST">
                <input type="hidden" name="tipo_cuenta" id="tipoCuenta" value="inquilino">
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Crear Cuenta</button>
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
            
            if (type === 'inquilino') {
                switchContainer.classList.add('active-inquilino');
                switchContainer.classList.remove('active-anfitrion');
                tipoCuentaInput.value = 'inquilino';
            } else {
                switchContainer.classList.add('active-anfitrion');
                switchContainer.classList.remove('active-inquilino');
                tipoCuentaInput.value = 'anfitrion';
            }
        }
    </script>
</body>
</html>