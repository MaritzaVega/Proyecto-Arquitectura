<?php include "Views/Templates/headermetodo.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Nueva Venta</li>
</ol>
    <div class="cardcampo">
        <div class="card-body">
            <form id="frmVenta">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigo"><i class="fas fa-barcode"></i> Código de barras</label>
<<<<<<< HEAD
                            <input type="hidden" id="id" name="id">
                             <!---buscarCodigoVenta esta en funciones.js!-->
=======
                           <input type="hidden" id="id" name="id">
>>>>>>> ce05f365e5b40d7f6890c1532e38e05b9c6567b2
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Codigo de Barras" onkeyup="buscarCodigoVenta(event)">
                            
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nombre">Descripción</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Descripción del Producto" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecioVenta(event)" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="precio">Precio</label>
<<<<<<< HEAD
                            <input id="precio" class="form-control" type="number" name="precio" placeholder="Precio Venta" disabled >
=======
                            <input id="precio" class="form-control" type="number" name="precio" placeholder="Precio venta" disabled >
>>>>>>> ce05f365e5b40d7f6890c1532e38e05b9c6567b2
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="sub_total">Sub Total</label>
                            <input id="sub_total" class="form-control" type="number" name="sub_total" placeholder="Sub Total" disabled >
                        </div>
                    </div>
                    
                </div>    
            </form>
        </div>
    </div>
<table class="table table-light">
    <thead class="thead-darkR">
        <tr>
            <th>Id</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Sub Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="tblDetalleVenta">
        <tr>
            <td scope="row"></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td scope="row"></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<div class="row">
<<<<<<< HEAD
    <!---/////////CLIENTE-!-->
        <div class="col-md-3">
            <div class="form-group">
                    <label for="cliente"><i class="fas fa-users"></i> Buscar Cliente</label>
                    <input id="cliente" class="form-control" type="text" name="cliente" placeholder="Nombre">
                    <input type="hidden" id="id" name="id">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                    <label for="telefono"><i class="fas fa-phone"></i> Teléfono</label>
                    <input id="telefono" class="form-control" type="number" name="telefono" placeholder="Teléfono" disabled>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                    <label for="cliente"><i class="fas fa-home"></i> Dirección</label>
                    <input id="cliente" class="form-control" type="text" name="cliente" placeholder="Dirección" disabled>
                    <input type="hidden" id="id" name="id">
            </div>
        </div>
<!---/////////!--->
        <div class="col-md-3">
                <div class="form-group">
                    <label for="total " class="font-weight-blod">Total</label>
                    <input id="total" class="form-control" type="number" name="total" placeholder="Total" disabled >
                     <!---generarVenta esta en funciones.js!-->
=======
        <div class="col-md-3">
                <div class="form-group">
                    <label for="cliente"><i class="fas fa-users"></i>Buscar cliente</label>
                    <input id="cliente" class="form-control" type="text" name="cliente"placeHolder="Nombre">
                    <input type="hidden" id="id" name="id">
                </div>
                
        </div>
        <div class="col-md-3">
                <div class="form-group">
                    <label for="cliente"><i class="fas fa-phone"></i>Telèfono</label>
                    <input id="cliente" class="form-control" type="text" name="Telèfono" placeHolder="Telefono" disabled>
                </div>
        </div>
        <div class="col-md-3">
                <div class="form-group">
                    <label for="cliente"><i class="fas fa-home"></i>Direcciòn</label>
                    <input id="cliente" class="form-control" type="text" name="telefono"placeHolder="Direcciòn" disabled>
                </div>
        </div>
        <div class="col-md-3">
                <div class="form-group">
                    <label for="total " class="font-weight-blod">Total a pagar</label>
                    <input id="total" class="form-control" type="number" name="total" placeholder="Total" disabled >
>>>>>>> ce05f365e5b40d7f6890c1532e38e05b9c6567b2
                    <button type="button" class="btn btn-compra mt-2 btn-block" onclick="generarVenta()">Generar Venta</button>
                </div>
                
        </div>
</div>
<?php include "Views/Templates/footer.php";?>