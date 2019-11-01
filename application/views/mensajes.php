<?php
// plantilla::aplicar();
$base = base_url('base');
$id_propiedad = $this->uri->segment(3);
// $propiedad = $this->propiedad_model->insertMessage(52);
$id_mensaje = $this->uri->segment(3);
$mensaje = $this->mensaje_model->mensaje_x_id($id_mensaje);


if($_POST){ 
    $mailcontent = new stdClass();
    $mailcontent->recipient = $_POST['recipient'];
    $mailcontent->reply = $_POST['email'];
    $mailcontent->nombre = $_POST['nombre']." ".$_POST['apellido'];
    $mailcontent->subject = $_POST['tema'];
    $mailcontent->mensaje = $_POST['mensaje'];
    $mailcontent->propiedad = "";
    $mailcontent->about = "acerca del";
    $mailcontent->from="propietario";
    $this->propiedad_model->sendMail($mailcontent);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Favicon  -->
<link rel="icon" href="<?=$base?>/img/core-img/favicon.ico">

<!-- Style CSS -->
<link rel="stylesheet" href="<?=$base?>/style.css">
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <title>Enviar mensajes</title>
</head>
<body>

<!-- Script para búsqueda -->
<script>
    $(document).ready(function(){
      $("#buscar_id").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabla tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
    <div class="container">
        <form action="" id="formform" method="post">
        <br>
            <!-- Button trigger modal -->
            <!-- Input de búsqueda -->
            <div class="form-row">
                <div class="col-md-8 mb-3 mt-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Filtro</span>
                        </div>
                        <input type="text" name="buscar" id="buscar_id" class="form-control" placeholder="Buscar" aria-describedby="inputGroupPrepend2">
                    </div>
                </div>
            </div>


        
        <table class="table">
        <thead>
            <th>Nombre</th>
            <th>De:</th>
            <th>Para:</th>
            <th>Tema</th>
            <th>Mensaje</th>
            <th>Acciones</th>
            <th></th>
        </thead>
        <tbody id="tabla">
        <?php
        $rs = Mensaje_model::listado_mensaje();
        foreach ($rs as $mensaje) {
            $urlBorrar = base_url("mensaje/borrar_mensaje/{$mensaje->id}");
            echo <<<CODIGO
            <tr>
            <td>{$mensaje->nombre}</td>
            <td>{$mensaje->de}</td>
            <td>{$mensaje->para}</td>
            <td>{$mensaje->tema}</td>
            <td>{$mensaje->mensaje}</td>
            <td><button type='button' class='btn btn-primary' id='btnResponder' data-toggle='modal' data-target='#MResponder'
            data-title='Enviar Mensaje' data-recipient='{$mensaje->de}' data-sender='{$mensaje->para}'
            data-subject='{$mensaje->tema}'>responder</button>
            <button  onclick='eliminar("{$urlBorrar}")' class='btn btn-danger'><i class='fas fa-times'></i><button/></td>
            </tr>
CODIGO;
        }
        ?>
        </tbody>
        </table>
    </div>
<!-- Modal Mensaje -->
<div class="modal fade" id="MResponder" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
    
        <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
        <form id="contact-form" method="post" role="form">

    <div class="messages"></div>

    <div class="controls">
        <div class="row">
            <div class="col-md-12">
                <div  class="form-group">
                    <label for="nombre" style="display: inline-block;">Para:</label>
                    <div style="display: inline-block;">
                        <input id="recipient" type="text" name="recipient" readonly class="form-control" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
             
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre *</label>
                    <input id="nombre" type="text" name="nombre" class="form-control" required placeholder="Digite su nombre "  data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input id="apellido" type="text" name="apellido" class="form-control"  placeholder="Digite su Apellido"  data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input id="email" type="email" name="email" readonly required class="form-control" placeholder="Digite su correo electronico *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_need">Tema *</label>
                    <select id="tema" name="tema" class="form-control"  data-error="Please specify your need.">
                        <option value=""></option>
                        <option value="Solicitar Visita">Solicitar Visita</option>
                        <option value="Acerca del inmueble">Acerca del inmueble</option>
                        <option value="Contactos">Contactos</option>
                        <option value="Otros">Otros</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mensaje">Mensaje *</label>
                    <textarea id="mensaje" name="mensaje" required class="md-textarea form-control" rows="5" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <div class="modal-footer">
        <input type="button"  onclick="confirmation()" class="btn btn-success btn-send"  value="Enviar mensaje">
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- Fin Modal -->
  <script>
$('#MResponder').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)  // Boton que abrio el Modal
  var titulo = button.data('title');
  var modal = $(this)
  modal.find('.modal-title').text(titulo);
  document.getElementById('recipient').value = button.data('recipient');
  document.getElementById('email').value = button.data('sender');
  document.getElementById('tema').value = button.data('subject');
  });
  </script>
  <script>
function confirmation(){
    var mensaje = document.getElementById('mensaje').value;
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    if(mensaje != "" && nombre != "" && email !="" ){
        Swal.fire({
            title: 'Aviso',
            text: "Su Mensaje ha sido enviado con exito!",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.value) {
                document.getElementById('formform').submit();
            }
            })
    }
}
</script>
<script>
function eliminar(urlBorrar){
    Swal.fire({
            title: 'Aviso',
            text: "Desea Eliminar Este Mensaje?",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Confirmar'
            }).then((result) => {
            if (result.value) {
                location.href = urlBorrar;
            }
            })
}

  </script>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</body>
</html>