<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Gestión de Productos</li>
</ol>
<button class="btn btn-primary mb-4" type="button" onclick="frmProducto();">Nuevo <i class="fas fa-plus"></i></button>

<table class="table table-light" id="tblProductos">
    <thead class="thead-darkR">
        <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Còdigo</th>
            <th>Descripciòn</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Nivel</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<!---MODAL DE CREAR "REGISTRAR - EDITAR NUEVO Producto"!-->
<div id="nuevo-producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Registrar Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmProducto">
                    <div class="form-group">
                        <label for="codigo">Código de barras</label>
                        <input type="hidden" id="id" name="id">
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de barras">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Descripción</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del producto">
                    </div>
                    <div class="row" id="claves">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio_compra">Precio Compra</label>
                                <input id="precio_compra" class="form-control" type="text" name="precio_compra" placeholder="Precio Compra">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio_venta">Precio Venta</label>
                                <input id="precio_venta" class="form-control" type="text" name="precio_venta" placeholder="Precio Venta">
                            </div>
                        </div>
                    </div>
                    
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="cardcampo border-primary">
                                <div class="card-body">
                                    <label for="imagen" id="icon-image" class="btn btn-primary"><i class="fas fa-image"></i></label>
                                    <span id="icon-cerrar"></span><br>
                                    <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event)">
                                    <input type="hidden" id="foto_actual" name="foto_actual">
                                    <!--<input type="hidden" id="foto_delete" name="foto_delete">SE ELIMINO!-->
                                    <img class="img-thumbnail" id="img-preview">
                                </div>
                            </div>
                        </div>
                    
                    <!--<div class="form-group">
                        <label for="nivel">Nivel de Stock</label>
                        <input id="nivel" class="form-control" type="text" minlength="8" maxlength="12" name="nivel" placeholder="Nivel de Stock">
                    </div>-->
                    <button class="btn btn-primary" type="button" onclick="registrarPro(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>