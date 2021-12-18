
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema de Ventas Américo</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="fondo">
        
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                  
                                    <img src="Assets/img/logo.jpg">
                                    <div class="card-body">
                                        <form id="frmLogin">
                                            <div class="form-group">
                                                <label class="small mb-1 text-white "  for="inputEmailAddress">
                                                    <i class="fas fa-user"></i> Usuario</label>
                                                <input class="form-control1  py-4" id="usuario" name="usuario" type="text" placeholder="Ingrese usuario" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1 text-white " for="inputPassword"><i class="fas fa-key"></i> Clave</label>
                                                <input class="form-control1 py-4" id="clave" name="clave" type="password" placeholder="Ingrese contraseña" />
                                            </div>
                                            <!--Muestra cuando mensaje cuando los datos son invalidos--> 
                                            <div class="alert alert-danger text-center d-none" id="alerta" role="alert">
                                                
                                            </div>
                                        
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                                <button class="btn btn-danger2" type="submit" onclick="frmLogin(event)">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sistema de Ventas Américo <?php echo date("Y")?></div>

                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script>
            const base_url = "<?php echo base_url;?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
    </body>
</html>
