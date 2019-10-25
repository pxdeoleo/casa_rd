<?php
$base = base_url('base');
if ($_POST) {
    $usuario = $_POST;
    Cuenta_model::guardar_usuario($usuario);

    redirect('');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de usuarios CasasRD</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?=$base?>/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?=$base?>/css/style.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="<?=$base?>/images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>Formulario de registro</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nombre">Nombre :</label>
                                <input type="text" name="nombre" id="nombre" required/>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido :</label>
                                <input type="text" name="apellido" id="apellido" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion :</label>
                            <input type="text" name="direccion" id="direccion" required/>
                        </div>
                        <div class="form-radio">
                            <label for="genero" class="radio-label">Genero :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="genero" id="male" checked  required>
                                <label for="male">Hombre</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="genero" id="female">
                                <label for="female">Mujer</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nacionalidad">Pais :</label>
                                <div class="form-select">
                                <input type="text" name="nacionalidad" id="nacionalidad" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ciudad">Ciudad :</label>
                                <div class="form-select">
                                <input type="text" name="ciudad" id="ciudad" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="telefono">No. Telefono :</label>
                                <input type="text" name="telefono" id="telefono" required>
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cédula de Identidad :</label>
                                <input type="text" name="cedula" id="cedula"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre_empresa">Empresa de Bienes Raíces :</label>
                            <input type="text" name="nombre_empresa" id="nombre_empresa" required>
                        </div>
                        <div class="form-group">
                            <label for="user">Usuario :</label>
                            <input type="text" name="user" id="user" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña :</label>
                            <input type="password" name="pass" id="pass" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Email :</label>
                            <input type="email" name="correo" id="correo"  required>
                        </div>
                        <div class="form-submit">
                            <input type="reset" class="submit"  id="reset" />
                            <input type="submit" class="submit"  id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="<?=$base?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$base?>/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>