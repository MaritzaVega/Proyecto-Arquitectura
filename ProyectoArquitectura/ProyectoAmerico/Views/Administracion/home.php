<?php include "Views/Templates/headermetodo.php";?>
<!--Cuadros de clientes , Productos, Usuarios!-->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="cardcampo bg-info">
            <div class="card-body d-flex text-white">
                Usuario
               <i class="fas fa-user fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-item-center justify-content-between">
                <a href="<?php echo base_url; ?>Usuarios" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['usuarios']['total'];?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="cardcampo bg-vine">
            <div class="card-body d-flex text-white">
                Clientes
               <i class="fas fa-users fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-item-center justify-content-between">
                <a href="<?php echo base_url; ?>Clientes" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['clientes']['total'];?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="cardcampo bg-sunwdark">
            <div class="card-body d-flex text-white">
                Productos
               <i class="fab fa-product-hunt fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-item-center justify-content-between">
                <a href="<?php echo base_url; ?>Productos" class="text-white">Ver Detalle</a>
                <span class="text-white"><?php echo $data['productos']['total'];?></span>
            </div>
        </div>
    </div>
</div>
<!--Reporte grafico!-->
<div class="row mt-3">
    <div class="col-xl-6">
        <div class="cardcampo">
            <div class="card-header bg-dark text-white">
                Productos con Stock Minimo
            </div>
            <div class="card-body">
                <canvas id="stockMinimo" width="400" height="400"></canvas>  
            </div>
        </div>
    </div>  
    <div class="col-xl-6">
        <div class="cardcampo">
            <div class="card-header bg-dark text-white">
                Productos más Vendidos
            </div>
            <div class="card-body">
                <canvas id="ProductosVendidos" width="400" height="400"></canvas> 
            </div>
        </div>
    </div>  
</div>
<?php include "Views/Templates/footer.php";?>