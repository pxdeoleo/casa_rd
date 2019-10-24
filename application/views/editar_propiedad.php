<?php
if ($_POST) {
    $propiedad = $_POST;
    Propiedad_model::guardar_propiedad($propiedad);

    redirect('main/propiedad');
}

$propiedad = new stdClass;
$propiedad->id = '';
if (isset($id)) {
    $rs = Propiedad_model::propiedad_x_id($id);
    if (count($rs) > 0) {
        $propiedad = $rs[0];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="" method="POST">    
        <h3>EDITAR PROPIEDAD</h3>
        <input type="hidden" name="id" value='<?=$propiedad['id']?>' class="form-control" placeholder="Nombre..." aria-describedby="inputGroupPrepend2" required>
     <!--   <div class="form-row">
            <div class="col-md-3 mb-3">
                <label>Nombre:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre..." required>
            </div>
            <div class="col-md-3 mb-3">
                <label>Cedula:</label>
                <input type="text" class="form-control" placeholder="Cedula..." required>
            </div>
            <div class="col-md-3 mb-3">
                <label>Correo:</label>
            <input type="text" class="form-control" placeholder="Correo..." required>
            </div>
        </div>-->

        <div class="form-row">
            <div class="col-md-6 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                    </div>
                    <input type="text" name="nombre" value='<?= $propiedad['nombre']?>' class="form-control" placeholder="Nombre..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Visitas</span>
                    </div>
                    <input type="text" name="visitas" value='<?= $propiedad['visitas']?>' class="form-control" placeholder="Visitas..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-9 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Direccion</span>
                    </div>
                    <input type="text" name="direccion" value='<?= $propiedad['direccion']?>' class="form-control" placeholder="Direccion..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Sector</span>
                    </div>
                    <input type="text" name="sector" value='<?= $propiedad['sector']?>' class="form-control" placeholder="Sector..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ciudad</span>
                    </div>
                    <input type="text" name="ciudad" value='<?= $propiedad['ciudad']?>' class="form-control" placeholder="Ciudad..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Provincia</span>
                    </div>
                    <input type="text" name="provincia" value='<?= $propiedad['provincia']?>' class="form-control" placeholder="Provincia..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Baños</span>
                    </div>
                    <input type="text" name="banos" value='<?= $propiedad['banos']?>' class="form-control" placeholder="baños..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Habitaciones</span>
                    </div>
                    <input type="text" name="hab" value='<?= $propiedad['hab']?>' class="form-control" placeholder="Habitaciones..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Parqueos</span>
                    </div>
                    <input type="text" name="par" value='<?= $propiedad['par']?>' class="form-control" placeholder="Parqueos..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Area</span>
                    </div>
                    <input type="text" name="area" value='<?= $propiedad['area']?>' class="form-control" placeholder="Area..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Fecha</span>
                    </div>
                    <input type="date" name="fecha" value='<?= $propiedad['fecha']?>' class="form-control" placeholder="Direccion..." aria-describedby="inputGroupPrepend2">
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Precio</span>
                    </div>
                    <input type="text" name="precio" value='<?= $propiedad['precio']?>' class="form-control" placeholder="Precio..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Descripcion</span>
                    </div>
                    <textArea type="text" name="descripcion" value='<?= $propiedad['descripcion']?>' class="form-control" placeholder="Descripcion..." aria-describedby="inputGroupPrepend2"></textArea>
                </div>
            </div>

            <div class="col-md-5 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Caracteristicas</span>
                    </div>
                    <textArea type="text" name="caracteristicas" value='<?= $propiedad['caracteristicas']?>' class="form-control" placeholder="Caracteristicas..." aria-describedby="inputGroupPrepend2"></textArea>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Categoria</span>
                    </div>
                    <input type="text" name="id_categoria" value='<?= $propiedad['id_categoria']?>' class="form-control" placeholder="Area..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <button class="btn btn-warning" type="submit">Editar</button>
    </form>
    </div>
</body>
</html>