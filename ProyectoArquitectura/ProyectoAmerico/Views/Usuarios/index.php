<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Usuarios</li>
</ol>
<button class="btn btn-primary mb-4" type="button" onclick="frmUsuario();">Crear</button>
<table class="table table-light" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>N° Documento</th>
            <th>Estado</th>
            <th>Opción</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<!---MODAL DE CREAR "REGISTRAR NUEVO USUARIO"!-->
<div id="nuevo-usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Registrar Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="usuario">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombres">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clave">Contraseña</label>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmar">Confirmar Contraseña</label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="doc">Documento</label>
                        <select id="doc" class="form-control" name="doc">
                            <?php foreach ($data['documentos'] as $row){ ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['doc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numDocumento">Número de Documento</label>
                        <input id="numDocumento" class="form-control" type="text" name="numDocumento" placeholder="N° Documento">
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarUser(event);">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "Views/Templates/footer.php";?>