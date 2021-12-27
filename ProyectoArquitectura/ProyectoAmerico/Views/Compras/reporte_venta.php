<?php include "Views/Templates/headermetodo.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Reportes de Venta</li>
</ol>
<form action="<?php echo base_url; ?>Compras/pdf" method="POST" target="_blank">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="min">Desde</label>
                <input type="date" value="<?php echo date ('Y-m-d'); ?>" name="desde" id="min">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="hasta">Hasta</label>
                <input type="date" value="<?php echo date ('Y-m-d'); ?>" name="hasta" id = "hasta">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <button type="submit" class="btn btn-danger">PDF</button>
            </div>
        </div>
    </div>
</form>

<div class="cardcampo my-2">
    <div class="cardcampo">
        <div class="card-header bg-dark text-white">
            Ventas
        </div>
    </div>
    <div class="card-body">
    <table class="table table-light" id="t_reporte_v">
    <thead class="thead-darkR">
        <tr>
            <th>#</th>
            <th>Clientes</th>
            <th>Total</th>
            <th>Fecha de Venta </th>
            <th>Reporte</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
    </div>
</div>

<?php include "Views/Templates/footer.php";?>