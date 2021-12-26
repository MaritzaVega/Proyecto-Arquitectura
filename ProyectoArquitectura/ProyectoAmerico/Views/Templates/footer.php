</div>
</main>
<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sistema de Ventas Américo</div>
                           <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> !-->
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Modal Perfil -->
        <div id="cambiarPerfil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title"> Perfil </h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmCambiarPerfil">
                            <div class="form-group">
                                <label for="clave_actual">Nombre</label>
                                <input id="clave_actual" class="form-control" type="text" name="perfil_nombre" value="<?php echo $data['nombre'];?>>">
                            </div>
                            <div class="form-group">
                                <label for="clave_nueva">N° documento</label>
                                <input id="clave_nueva" class="form-control" type="text" name="perfil_doc" value="<?php echo $data['mensaje'];?>">
                            </div>
                            <div class="form-group">
                                <label for="confirmar_clave">Usuario</label>
                                <input id="confirmar_clave" class="form-control" type="text" name="perfil_user" placeholder="Usuario">
                            </div>
                            <button class="btn btn-primary" type="submit">Modificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Cambiar Contraseña -->
        <div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title">Modificar Contraseña</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmCambiarPass" onsubmit="frmCambiarPass(event);">
                            <div class="form-group">
                                <label for="clave_actual">Contraseña Actual</label>
                                <input id="clave_actual" class="form-control" type="password" name="clave_actual" placeholder="Contraseña Actual">
                            </div>
                            <div class="form-group">
                                <label for="clave_nueva">Contraseña Nueva</label>
                                <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Nueva Contraseña">
                            </div>
                            <div class="form-group">
                                <label for="confirmar_clave">Confirmar Contraseña</label>
                                <input id="confirmar_clave" class="form-control" type="password" name="confirmar_clave" placeholder="Confirmar Contraseña">
                            </div>
                            <button class="btn btn-primary" type="submit">Modificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>

        <script src="<?php echo base_url; ?>Assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/DataTables/datatables.min.js" crossorigin="anonymous"></script>
       
        <!--https://datatables.net/download/-!-->

        <script>
            const base_url = "<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>        
        <script src="<?php echo base_url; ?>Assets/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/chart.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
    </body>
</html>

<!--  <script src="<//?php echo base_url; ?>Assets/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<//?php echo base_url; ?>Assets/demo/chart-area-demo.js"></script>
        <script src="<//?php echo base_url; ?>Assets/demo/chart-bar-demo.js"></script>
        **<script src="<//?php echo base_url; ?>Assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        **<script src="<//?php echo base_url; ?>Assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
          <script src="<//?php echo base_url; ?>Assets/demo/datatables-demo.js"></script>!
    
          otro de la tabla dataTable
           <script src="<//?php echo base_url; ?>Assets/DataTables/datatables.min.js" crossorigin="anonymous"></script>
        
        
        -->


