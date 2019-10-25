<?php
// plantilla::aplicar();
session_start();

if(isset($_POST['user'])){
  if(Cuenta_model::inicio_sesion($_POST['user'], $_POST['pass'])){
	$_SESSION['user']=$_POST['user'];
	$_SESSION['id_usuario']=
    redirect(base_url(''));
    $malpass='';
  }else{
    $malpass = "Credenciales no coinciden";
  }
}else{
  $malpass='';
}
if(isset($_SESSION['user'])){
  redirect(base_url(''));
}
$base = base_url('base');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inicio de Sesion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=$base?>/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$base?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$base?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$base?>/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$base?>/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=$base?>/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$base?>/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$base?>/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=$base?>/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$base?>/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=$base?>/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-70">
						Bienvenido
					</span>
					<span class="login100-form-avatar">
						<img src="<?=$base?>/images/avatar-01.jpg" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Ingrese el nombre de usuario">
						<input class="input100" type="text" name="user">
						<span class="focus-input100" data-placeholder="Usuario"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Ingrese la contraseña">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Iniciar sesión
						</button>
					</div>
					<br>	
						<li>
							<span class="txt1">
								No estas registrado?
							</span>

							<a href="<?=base_url('cuenta/registro')?>" class="txt2">
								Registrarme
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=$base?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=$base?>/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/js/main.js"></script>

</body>
</html>