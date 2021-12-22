<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Nueva Compra</li>
</ol>
    <div class="cardcampo">
        <div class="card-body">
            <form id="frmCompra">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigo"><i class="fas fa-barcode"></i> Código de barras</label>
                           <input type="hidden" id="id" name="id">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Codigo de Barras" onkeyup="buscarCodigo(event)">
                            
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
                            <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecio(event)" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input id="precio" class="form-control" type="number" name="precio" placeholder="Precio Compra" disabled >
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
        <div class="col-md-4 ml-auto">
                <div class="form-group">
                    <label for="total " class="font-weight-blod">Total</label>
                    <input id="total" class="form-control" type="number" name="total" placeholder="Total" disabled >
                    <button type="button" class="btn btn-compra mt-2 btn-block" onclick="generarCompra()">Generar Compra</button>
                </div>
                
        </div>
</div>
<?php include "Views/Templates/footer.php";?>