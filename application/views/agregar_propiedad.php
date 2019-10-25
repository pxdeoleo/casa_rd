<?php
if ($_POST) {
    $propiedad = $_POST;
    Propiedad_model::guardar_propiedad($propiedad);

    redirect('main/propiedad');
}
$base = base_url('base');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrar Propiedad</title>
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
	<link rel="stylesheet" type="text/css" href="<?=$base?>/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=$base?>/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=$base?>/css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Agregar Propiedad
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Porfavor no dejar el campo vacío">
					<span class="label-input100">Nombre completo *</span>
					<input class="input100" type="text" name="name" placeholder="Introducir Nombre">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Porfavor no dejar el campo vacío (e@a.x)">
					<span class="label-input100">Email *</span>
					<input class="input100" type="text" name="email" placeholder="Introducir Email ">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Telefono</span>
					<input class="input100" type="text" name="phone" placeholder="Introducir Telefono">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Porfavor no dejar el campo vacío (e@a.x)">
					<span class="label-input100">Dirección</span>
					<input class="input100" type="text" name="email" placeholder="Introducir Dirección ">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Sector</span>
					<input class="input100" type="text" name="phone" placeholder="Introducir Sector">
				</div>

				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Ciudad</span>
					<div>
						<select class="js-select2" name="service">
							<option>Seleccionar Ciudad</option>
							<option>Opción 1</option>
							<option>Opción 2</option>
							<option>Opción 3</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Provincia</span>
					<div>
						<select class="js-select2" name="service">
							<option>Seleccionar Provincia</option>
							<option>Opción 1</option>
							<option>Opción 2</option>
							<option>Opción 3</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Categoria</span>
					<div>
						<select class="js-select2" name="service">
							<option>Seleccionar Categoria</option>
							<option>Opción 1</option>
							<option>Opción 2</option>
							<option>Opción 3</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Parqueos</span>
					<div>
						<select class="js-select2" name="service">
							<option>Seleccionar Parqueos</option>
							<option>Opción 1</option>
							<option>Opción 2</option>
							<option>Opción 3</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Area</span>
					<input class="input100" type="text" name="phone" placeholder="Introducir Area en m²">
				</div>


				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Baños *</span>
					<div>
						<select class="js-select2" name="service">
							<option>Seleccionar cantidad de baños</option>
							<option>Opción 1</option>
							<option>Opción 2</option>
							<option>Opción 3</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-contact100-form-range">
						<span class="label-input100">Precio *</span>

						<div class="contact100-form-range-value">
							$<span id="value-lower">610</span> - $<span id="value-upper">980</span>
							<input type="text" name="from-value">
							<input type="text" name="to-value">
						</div>

						<div class="contact100-form-range-bar">
							<div id="filter-bar"></div>
						</div>
					</div>

					<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Imagenes de la propiedad</span>
					<input class="input100" type="file" name="img">
				</div>

	<!--			<div class="w-full dis-none js-show-service">
					<div class="wrap-contact100-form-radio">
						<span class="label-input100">What type of products do you sell?</span>

						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio1" type="radio" name="type-product" value="physical" checked="checked">
							<label class="label-radio100" for="radio1">
								Phycical Products
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio2" type="radio" name="type-product" value="digital">
							<label class="label-radio100" for="radio2">
								Digital Products
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio3" type="radio" name="type-product" value="service">
							<label class="label-radio100" for="radio3">
								Services Consulting
							</label>
						</div>
					</div>

					<div class="wrap-contact100-form-range">
						<span class="label-input100">Budget *</span>

						<div class="contact100-form-range-value">
							$<span id="value-lower">610</span> - $<span id="value-upper">980</span>
							<input type="text" name="from-value">
							<input type="text" name="to-value">
						</div>

						<div class="contact100-form-range-bar">
							<div id="filter-bar"></div>
						</div>
					</div>
				</div>

			-->

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Descripción</span>
					<textarea class="input100" name="message" placeholder="Introducir Descripción de la propiedad aqui..."></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Enviar
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=$base?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=$base?>/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=$base?>/vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="<?=$base?>/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
