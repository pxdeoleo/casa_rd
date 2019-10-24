<?php
if ($_POST) {
    $usuario = $_POST;
    Usuario_model::guardar_usuario($usuario);

    redirect('main');
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
        <h3>AGEGAR USUARIO</h3>
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
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                    </div>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Cedula</span>
                    </div>
                    <input type="text" name="cedula" class="form-control" placeholder="Cedula..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-5 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Correo</span>
                    </div>
                    <input type="text" name="correo" class="form-control" placeholder="Correo electronico..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Telefono</span>
                    </div>
                    <input type="text" name="telefono" class="form-control" placeholder="Telefono..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nacionalidad</span>
                    </div>
                    <input type="text" name="nacionalidad" class="form-control" placeholder="Nacionalidad..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Genero:</span>
                    </div>
                    <select class="custom-select" name="genero" required>
                        <option value="">Seleccione</option>
                        <option value="M">Hombre</option>
                        <option value="F">Mujer</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Empresa</span>
                    </div>
                    <input type="text" name="nombre_empresa" class="form-control" placeholder="Empresa..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ciudad</span>
                    </div>
                    <input type="text" name="ciudad" class="form-control" placeholder="Ciudad..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-8 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Direccion</span>
                    </div>
                    <input type="text" name="direccion" class="form-control" placeholder="Direccion..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Usuario</span>
                    </div>
                    <input type="text" name="user" class="form-control" placeholder="Usuario..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Contraseña</span>
                    </div>
                    <input type="password" name="pass" class="form-control" placeholder="Contraseña..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Agregar</button>
    </form>

<hr />
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Cedula</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Nacionalidad</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
        <?php
        $rs = Usuario_model::listado_usuario();
        foreach ($rs as $usuario) {
            $urlEditar = base_url("index.php/main/editar_usuario/{$usuario->id}");
            $urlBorrar = base_url("index.php/main/borrar_usuario/{$usuario->id}");
            echo"
            <tr>
            <td>{$usuario->nombre}</td>
            <td>{$usuario->cedula}</td>
            <td>{$usuario->correo}</td>
            <td>{$usuario->telefono}</td>
            <td>{$usuario->nacionalidad}</td>
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