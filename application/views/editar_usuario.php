<?php
if ($_POST) {
    $usuario = $_POST;
    Usuario_model::guardar_usuario($usuario);

    redirect('main');
}

$usuario = new stdClass;
$usuario->id = '';
if (isset($id)) {
    $rs = Usuario_model::usuario_x_id($id);
    if (count($rs) > 0) {
        $usuario = $rs[0];
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
        <h3>EDITAR USUARIO</h3>
        <input type="hidden" name="id" value='<?=$usuario['id']?>' class="form-control" placeholder="Nombre..." aria-describedby="inputGroupPrepend2" required>
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
                    <input type="text" name="nombre" value='<?=$usuario['nombre']?>' class="form-control" placeholder="Nombre..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Cedula</span>
                    </div>
                    <input type="text" name="cedula" value='<?=$usuario['cedula']?>' class="form-control" placeholder="Cedula..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-5 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Correo</span>
                    </div>
                    <input type="text" name="correo" value='<?=$usuario['correo']?>' class="form-control" placeholder="Correo electronico..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Telefono</span>
                    </div>
                    <input type="text" name="telefono" value='<?=$usuario['telefono']?>' class="form-control" placeholder="Telefono..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nacionalidad</span>
                    </div>
                    <input type="text" name="nacionalidad" value='<?=$usuario['nacionalidad']?>' class="form-control" placeholder="Nacionalidad..." aria-describedby="inputGroupPrepend2" required>
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
                    <input type="text" name="nombre_empresa" value='<?=$usuario['nombre_empresa']?>' class="form-control" placeholder="Empresa..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ciudad</span>
                    </div>
                    <input type="text" name="ciudad" value='<?=$usuario['ciudad']?>' class="form-control" placeholder="Ciudad..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-8 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Direccion</span>
                    </div>
                    <input type="text" name="direccion" value='<?=$usuario['direccion']?>' class="form-control" placeholder="Direccion..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Usuario</span>
                    </div>
                    <input type="text" name="user" value='<?=$usuario['user']?>' class="form-control" placeholder="Usuario..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>

            <div class="col-md-4 mb-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Contraseña</span>
                    </div>
                    <input type="password" name="pass" value='<?=$usuario['pass']?>' class="form-control" placeholder="Contraseña..." aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
        </div>

        <button class="btn btn-warning" type="submit">Editar</button>
    </form>
    </div>
</body>
</html>