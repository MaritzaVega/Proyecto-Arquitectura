<?php include "Views/Templates/header.php";?>
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
                            <input type="hidden" id="id" name="id">
                             <!---buscarCodigoVenta esta en funciones.js!-->
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
                            <input id="precio" class="form-control" type="number" name="precio" placeholder="Precio Venta" disabled >
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
    <tbody id="tblDetalle">
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
                    <button type="button" class="btn btn-compra mt-2 btn-block" onclick="generarVenta()">Generar Venta</button>
                </div>
                
        </div>
</div>
<?php include "Views/Templates/footer.php";?>