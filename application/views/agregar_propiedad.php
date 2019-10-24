<?php
if ($_POST) {
    $propiedad = $_POST;
    Propiedad_model::guardar_propiedad($propiedad);

    redirect('main/propiedad');
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
        <h3>AGEGAR PROPIEDAD</h3>
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
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Visitas</span>
                    </div>
                    <input type="text" name="visitas" class="form-control" placeholder="Visitas..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-9 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Direccion</span>
                    </div>
                    <input type="text" name="direccion" class="form-control" placeholder="Direccion..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Sector</span>
                    </div>
                    <input type="text" name="sector" class="form-control" placeholder="Sector..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ciudad</span>
                    </div>
                    <input type="text" name="ciudad" class="form-control" placeholder="Ciudad..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Provincia</span>
                    </div>
                    <input type="text" name="provincia" class="form-control" placeholder="Provincia..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Baños</span>
                    </div>
                    <input type="text" name="banos" class="form-control" placeholder="baños..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Habitaciones</span>
                    </div>
                    <input type="text" name="hab" class="form-control" placeholder="Habitaciones..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Parqueos</span>
                    </div>
                    <input type="text" name="par" class="form-control" placeholder="Parqueos..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Area</span>
                    </div>
                    <input type="text" name="area" class="form-control" placeholder="Area..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Fecha</span>
                    </div>
                    <input type="date" name="fecha" class="form-control" placeholder="Direccion..." aria-describedby="inputGroupPrepend2">
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Precio</span>
                    </div>
                    <input type="text" name="precio" class="form-control" placeholder="Precio..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Descripcion</span>
                    </div>
                    <textArea type="text" name="descripcion" class="form-control" placeholder="Descripcion..." aria-describedby="inputGroupPrepend2" required></textArea>
                </div>
            </div>

            <div class="col-md-5 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Caracteristicas</span>
                    </div>
                    <textArea type="text" name="caracteristicas" class="form-control" placeholder="Caracteristicas..." aria-describedby="inputGroupPrepend2" required></textArea>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

<hr />
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Fecha</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
        <?php
        $rs = Propiedad_model::listado_propiedad();
        foreach ($rs as $propiedad) {
            $urlEditar = base_url("index.php/main/editar_propiedad/{$propiedad->id}");
            $urlBorrar = base_url("index.php/main/borrar_propiedad/{$propiedad->id}");
            echo"
            <tr>
            <td>{$propiedad->nombre}</td>
            <td>{$propiedad->direccion}</td>
            <td>{$propiedad->fecha}</td>
            <td>{$propiedad->precio}</td>
            <td>{$propiedad->descripcion}</td>
            <td><a href='$urlEditar' onclick=\"return confirm('Estas seguro de editarlo?')\" class='btn btn-warning'>E<a/></td>
            <td><a href='$urlBorrar' onclick=\"return confirm('Estas seguro de eliminarlo?')\" class='btn btn-danger'>X<a/></td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>