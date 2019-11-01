<?php
session_start();
ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '20M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);
if ($_POST) {
	$propiedad = $_POST;

	if($_POST['moneda'] == 'RD$'){
		$_POST['precio'] = $_POST['precio'] * convertir_divisa($_POST['moneda']);
	}

	$propiedad['usuario_id'] = $_SESSION['id_usuario'];
    Propiedad_model::guardar_propiedad($propiedad);
    redirect('propiedades');
}
$base = base_url('base');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrar Propiedad</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
  	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script> 
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
			<form method="post" class="contact100-form validate-form" enctype="multipart/form-data">
				<span class="contact100-form-title">
					Agregar Propiedad
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Porfavor no dejar el campo vacío">
					<span class="label-input100">Nombre del anuncio*</span>
					<input class="input100"type="text" name="nombre" placeholder="Introducir Nombre" required>
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate = "Porfavor no dejar el campo vacío (e@a.x)" required>
					<span class="label-input100">Dirección</span>
					<input class="input100" type="text" name="direccion" placeholder="Introducir Dirección " required>
				</div>

				<div class="wrap-input100 bg1">
					<span class="label-input100">Sector</span>
					<input class="input100" type="text" name="sector" placeholder="Introducir Sector" required>
					<datalist id="sectores">
						<?php
							$ciudades = $this->propiedad_model->ciudades();

							foreach ($ciudades as $key => $value) {
								echo('<option>'.$value['ciudad'].'</option>');
							}
						?>
					</datalist>
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Ciudad</span>
					<input class="input100" type="text" list="ciudades" name="ciudad" placeholder="Introducir Ciudad" required>
					<datalist id="ciudades">
						<?php
							$ciudades = $this->propiedad_model->ciudades();

							foreach ($ciudades as $key => $value) {
								echo('<option>'.$value['ciudad'].'</option>');
							}
						?>
					</datalist>
				</div>

				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Categoria</span>
					<div>
						<select class="js-select2" name="id_categoria" required>
							<option selected disabled>Seleccionar Categoria</option>
							<?php
								$categorias = $this->categoria_model->get_categorias();
								foreach ($categorias as $key => $value) {
									echo('<option value="'.$value['id'].'">'.ucfirst($value['nombre']).'</option>');
								}
							?>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Parqueos</span>
					<input class="input100" type="number" name="par" min="0" required>
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Area en m²</span>
					<input class="input100" type="number" name="area" placeholder="Introducir Area en m²" min="0" required>
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Habitaciones*</span>
					<input class="input100" type="number" name="hab" required min="0">
				</div>
				
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Baños*</span>
					<input class="input100" type="number" name="banos" required min="0">
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">	
					<span class="label-input100">Precio*</span>
					<input class="input100" type="number" name="precio" required min="0">
				</div>

				<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
					<span class="label-input100">Moneda</span>
					<div>
						<select class="js-select2" name="id_categoria" required>
							<option disabled style="font-size:12px;">Moneda</option>
							<option value="RD$" style="font-size:12px;">RD$</option>
							<option value="USD"style="font-size:12px;" selected>USD</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Descripción</span>
					<textarea class="input100" name="descripcion" placeholder="Introducir Descripción de la propiedad aqui..."></textarea>
				</div>
				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Características</span>
					<textarea class="input100" name="caracteristicas" placeholder="Caracterisitca 1, Caracterisitca 2, Caracterisitca 3 "></textarea>
				</div>
				<div class="wrap-input100 bg1">
					<label>Localizacion: </label>
					<div style="height: 470px; " id="map"></div>
						<input hidden id="lugar" type="text" class="form-control"  required >
						<input hidden id="latitud" type="text" class="form-control" name="latitud" required >
						<input hidden id="longitud" type="text" class="form-control" name="longitud" required >
					</div>
				<div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Imagenes de la propiedad</span>
					<input class="input100" type="file" name="foto[]" multiple required>
				</div>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Enviar
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
				<div class="container-contact100-form-btn">
					<a href="<?= base_url('/propiedades');?>" class="contact100-form-btn"  style='text-decoration:none;color:white;'> Volver</a>
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
<script>
  var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {maxZoom: 18, minZoom: 7, attribution: 'FranWilbRol'});

  var map = L.map('map').setView([18.91668, -70.59814], 8).addLayer(osm);

  var marker;
  var $locali;
  map.on('click', function (e) {
      if (! marker) {
          marker = L.marker([0, 0]);
          marker.bindPopup("");
          marker.addTo(map);
      }
      marker.setLatLng(e.latlng);
      marker.setPopupContent("GPS coordinates: " + e.latlng.lat + ", " + e.latlng.lng + "<br />Searching for the address...");
      marker.update();
      marker.openPopup();
      map.panTo(e.latlng);
      $.getJSON("http://nominatim.openstreetmap.org/reverse?format=json&addressdetails=0&zoom=18&lat=" + e.latlng.lat + "&lon=" + e.latlng.lng + "&json_callback=?",
          function (response) {
              marker.setPopupContent(response.display_name);
              marker.update();
              $('#lugar').val(response.display_name);
              $('#latitud').val(response.lat);
              $('#longitud').val(response.lon);
          }
      );
  });
</script>
</body>
</html>

