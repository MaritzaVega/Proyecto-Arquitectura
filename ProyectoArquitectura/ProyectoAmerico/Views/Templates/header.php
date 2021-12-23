<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel de Administración</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />      
        <link href="<?php echo base_url; ?>Assets/css/select2.min.css" rel="stylesheet"/>  
        <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Sistema de Ventas</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <!--<div class="input-group">
                    <input class="form-control" type="text" placeholder="chSear for A..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>-->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarPass">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir">Cerrar Sesión</a> <!-- Método salir-->
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a href="#">
                                <img  src=".../../Assets/imagenes/logo.jpg" width= "100%">
                            </a>

                            <a class="nav-link" href="<?php echo base_url; ?>Administracion"> 
                                 <div class="sb-nav-link-icon"><i class="fas fa-university text-primary"></i></div>
                                 Institución
                            </a>
                            
                            <a class="nav-link" href="<?php echo base_url; ?>Usuarios"> 
                                 <div class="sb-nav-link-icon"><i class="fas fa-tools text-primary"></i></div>
                                 Usuarios
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>Productos"> 
                                 <div class="sb-nav-link-icon"><i class="fab fa-product-hunt text-primary"></i></div>
                                 Productos
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>Clientes"> 
                                 <div class="sb-nav-link-icon"><i class="fas fa-users text-primary"></i></div>
                                 Clientes
                            </a>
                            <!--<a class="nav-link" href="<?//php echo base_url; ?>Compras"> 
                                 <div class="sb-nav-link-icon"></div>
                                 Compras
                            </a>!-->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompras" aria-expanded="false" aria-controls="collapseCompras">
                                <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart text-primary"></i></div>
                                Operaciones
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCompras" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url; ?>Compras"><i class="fas fa-cart-plus mr-2 text-primary"></i> Nueva Compra</a> 
                                <!---Compras/historial!--->
                                <a class="nav-link" href="<?php echo base_url; ?>Compras/ventas"><i class="fas fa-cart-plus mr-2 text-primary"></i> Nueva Venta</a>
                                </nav>
                            </div>

                            <!---<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVenta" aria-expanded="false" aria-controls="collapseVenta">
                                <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart text-primary"></i></div>
                                Operaciones2
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseVenta" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<//?php echo base_url; ?>Compras/ventas"><i class="fas fa-cart-plus mr-2 text-primary"></i> Nueva Venta</a> 
                                !--><!---Compras/historial!
                                <a class="nav-link" href="<//?php echo base_url; ?>Compras/reporte_ventas"><i class="fas fa-cart-plus mr-2 text-primary"></i> Reporte Ventas</a>
                                </nav>
                            </div> !-->

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReporte" aria-expanded="false" aria-controls="collapseCompras">
                                <div class="sb-nav-link-icon"><i class="fa fa-file text-primary"></i></div>
                                Reportes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseReporte" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url; ?>Compras/reporte"><i class="fas fa-file mr-2 text-primary"></i> Reporte Compras</a>
                                <a class="nav-link" href="<?php echo base_url; ?>Compras/reporte_venta"><i class="fas fa-file mr-2 text-primary"></i> Reporte Ventas</a> 
                                <a class="nav-link" href="<?php echo base_url; ?>ProductosReporte"><i class="fas fa-file mr-2 text-primary"></i> Reporte Inventario</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sistema de Ventas Américo</div>
                        Americo S.A
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">
                        
                        
                    
