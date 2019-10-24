<?php
$base = base_url('base');
$usuario = $this->Usuario_model->nuevo_usuario();
// $cliente = $this->Usuario_model->nuevo_cliente();
$msg = "";
if($_POST){
        $usuario->nombre = $_POST['usuario'];
        $usuario->password = $_POST['password'];

    //Datos Cliente
    // $cliente->nombre = $_POST['nombre'].$_POST['apellido'];
    // $cliente->direccion = $_POST['direccion'];
    // $cliente->fecha = $_POST['fecha'];
    // $cliente->correo = $_POST['email'];
    // $cliente->genero = $_POST['genero'];
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
    <link rel="stylesheet" href="<?=$base?>/cssRegistro/style.css">
    <!-- Main css -->
  
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="<?=$base?>/img/imgRegister/signup-img.jpg" alt="">
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
                                <input type="radio" name="genero" id="masculino" value="Masculino">
                                <label for="masculino">Hombre</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="genero" id="femenino" value="Femenino">
                                <label for="genero">Mujer</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="pais">Pais :</label>
                                <div class="form-select">
                                <input type="text" name="pais" id="pais">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ciudad">Ciudad :</label>
                                <div class="form-select">
                                <input type="text" name="ciudad" id="ciudad">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="fecha">Fecha de nacimiento :</label>
                            <input type="date" name="fecha" id="fecha">
                        </div>
                        <div class="form-group">
                            
                            <label for="usuario">Usuario :</label>
                            <input type="text" name="usuario" id="usuario">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Contraseña :</label>
                                <div class="form-select">
                                <input type="password" name="password" id="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword">Confirmar Contraseña :</label>
                                <div class="form-select">
                                <input type="password" name="confirmpassword" id="confirmpassword" required>
                            </div>
                            </div>
                        </div>
                        <label style="font-weight: bold; color: red;" id="msg"></label>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" name="email" id="email" />
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Limpiar campos" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Enviar" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script>
        function checkPassword(){
            ps1 = document.getElementById('password');
            ps2 = document.getElementById('confirmpassword');
            document.getElementById('nombre').innerHTML = "kkk";
            if(ps1 != ps2 ){
                document.getElementById('msg').innerHTML "klk";
            }
            document.getElementById('register-form"').submit();
        }
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>