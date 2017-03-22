<?php 
//$valor = '';
//    foreach ($permisos as $permiso) {
//        $valor[$permiso->getId()] = $permiso->getId()."<br>";
//    }
//
//
//    if(((empty($valor[7])))){
?>
<header class="main-header">
        <!-- Logo -->
        <a href="<?php echo url_for('dashboard/index'); ?>" class="logo">Volar <b>en Globo</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/uploads/users/admin.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $agente_user_nombre; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/uploads/users/admin.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $agente_user_nombre; ?>
                      <small>Ultimo ingreso 
                      <?php echo $fechas->getFechaHora($agente_user_fecha_ultima); ?><br>
                      <b><?php echo $empresa_nombre ?></b>
                      </small>
                        
                    </p>
                    
                  </li>
                  <!-- Menu Body -->
<!--                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo url_for('personal/edit?id='.$usuario_id); ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo url_for('sf_guard_signout')?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/uploads/users/admin.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $agente_user_nombre; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <?php //if(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')==1) {?>
            <li class="header">CONFIGURACIONES</li>
            
             <li class=" treeview">
              <a href="#">
                <i class="fa fa-briefcase"></i> <span>Empresa</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 
                <li><a href="<?php echo url_for('empresa/editEmpresa'); ?>"><i class="fa fa-circle-o"></i> Datos generales</a></li>
                <li><a href="<?php echo url_for('personal/index'); ?>"><i class="fa fa-circle-o"></i> Personal</a></li>
                <?php if(!$padre) { ?>
                <li class="">
                  <a href="#"><i class="fa fa-circle-o"></i> Ubicación <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo url_for('provincia/index'); ?>"><i class="fa fa-circle-o"></i>Provincia</a></li>
                    <li><a href="<?php echo url_for('ciudad/index'); ?>"><i class="fa fa-circle-o"></i> Ciudad</a></li>
                    <li><a href="<?php echo url_for('ubicacion/index'); ?>"><i class="fa fa-circle-o"></i> Ubicaciones</a></li>
                  </ul>
                  
                </li>
                <?php }?>
                <?php if(!$padre) { ?>
                <li class="">
                  <a href="#"><i class="fa fa-circle-o"></i> Configurables <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo url_for('categoria/index'); ?>"><i class="fa fa-circle-o"></i> Categoría</a></li>
                    <li><a href="<?php echo url_for('marca/index'); ?>"><i class="fa fa-circle-o"></i> Marcas</a></li>
                    <li><a href="<?php echo url_for('pago/index'); ?>"><i class="fa fa-circle-o"></i> Forma de pago</a></li>
                    <li><a href="<?php echo url_for('rede/index'); ?>"><i class="fa fa-circle-o"></i> Redes sociales</a></li>
                    <li><a href="<?php echo url_for('rango_edad/index'); ?>"><i class="fa fa-circle-o"></i> Rango edad</a></li>
                    <li><a href="<?php echo url_for('tipo_personal/index'); ?>"><i class="fa fa-circle-o"></i> Tipo personal</a></li>
                    <li><a href="<?php echo url_for('tipo_cliente/index'); ?>"><i class="fa fa-circle-o"></i> Tipo cliente</a></li>
                    <li><a href="<?php echo url_for('campo/index'); ?>"><i class="fa fa-circle-o"></i> Campos adicionales</a></li>
                    
                  </ul>
                </li>
                
                <li class="">
                  <a href="#"><i class="fa fa-circle-o"></i> FAQ <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo url_for('faq/index'); ?>"><i class="fa fa-circle-o"></i> Categoria FAQ</a></li>
                    <li><a href="<?php echo url_for('detalle_faq/index'); ?>"><i class="fa fa-circle-o"></i> Preguntas - respuestas</a></li>
                  </ul>
                </li>
                
                <li class="">
                  <a href="#"><i class="fa fa-circle-o"></i> Quienes somos <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo url_for('seccion/index'); ?>"><i class="fa fa-circle-o"></i> Secciones</a></li>
                    
                  </ul>
                </li>
                
                <?php }?>
                
              </ul>
              
              
            </li> 
           
          
            <li class="header">SERVICIOS / PRODUCTOS</li>
           
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-cloud"></i> <span>Globos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 
                 <li class="">
                  <a href="#"><i class="fa fa-circle-o"></i> Configurables <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    
                    <li><a href="<?php echo url_for('tipo_vuelo/index'); ?>"><i class="fa fa-circle-o"></i> Tipo de vuelo</a></li>
                    <li><a href="<?php echo url_for('tipo_motivo/index'); ?>"><i class="fa fa-circle-o"></i> Motivos</a></li>
                    <li><a href="<?php echo url_for('tipo_lona/index'); ?>"><i class="fa fa-circle-o"></i> Tipo de Lonas</a></li>
                    <li><a href="<?php echo url_for('tipo_restriciones/index'); ?>"><i class="fa fa-circle-o"></i> Restriciones</a></li>
                    <li><a href="<?php echo url_for('tipo_recomendaciones/index'); ?>"><i class="fa fa-circle-o"></i> Recomendaciones</a></li>
                    <li><a href="<?php echo url_for('quemador/index'); ?>"><i class="fa fa-circle-o"></i> Quemadores</a></li>
                    <li><a href="<?php echo url_for('tipo_canastilla/index'); ?>"><i class="fa fa-circle-o"></i> Tipo canastilla</a></li>
                    <li><a href="<?php echo url_for('canastilla/index'); ?>"><i class="fa fa-circle-o"></i> Canastilla</a></li>
                    <li><a href="<?php echo url_for('tanque/index'); ?>"><i class="fa fa-circle-o"></i> Tanques</a></li>
                    
                  </ul>
                </li>
<!--                <li class="">
                  <a href="#"><i class="fa fa-circle-o"></i> Mantenimiento <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo url_for('quemador/index'); ?>"><i class="fa fa-circle-o"></i> Quemadores</a></li>
                    <li><a href="<?php echo url_for('canastilla/index'); ?>"><i class="fa fa-circle-o"></i> Canastilla</a></li>
                    <li><a href="<?php echo url_for('tanque/index'); ?>"><i class="fa fa-circle-o"></i> Tanques</a></li>
                    <li><a href="<?php echo url_for('quemador/index'); ?>"><i class="fa fa-circle-o"></i> Globos</a></li>
                  </ul>
                </li>-->
                
                <li><a href="<?php echo url_for('tripulacion/index'); ?>"><i class="fa fa-circle-o"></i> Tripulacion</a></li>  
                <li><a href="<?php echo url_for('globo/index'); ?>"><i class="fa fa-circle-o"></i> Globos</a></li>
                
              
                
              </ul>
              
              
            </li>
            
            
             <li class=" treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Proveedores</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">   
                <li><a href="<?php echo url_for('proveedor/index'); ?>"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                <li><a href="<?php echo url_for('servicio/index'); ?>"><i class="fa fa-circle-o"></i> Servicios</a></li>
              </ul>
            </li>
            
<!--            <li class=" treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Transporte</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">   
                <li class="">
                  <a href="#"><i class="fa fa-circle-o"></i> Configurables <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo url_for('tipo_vuelo/index'); ?>"><i class="fa fa-circle-o"></i> Tipo de licencia</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo url_for('proveedor/index'); ?>"><i class="fa fa-circle-o"></i> Operador transporte</a></li>
                <li><a href="<?php echo url_for('servicio/index'); ?>"><i class="fa fa-circle-o"></i> Vehiculo</a></li>
              </ul>
            </li>
            -->
            
            
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-home"></i> <span>Hospedaje</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
                
                
              <ul class="treeview-menu">
                  
                  <li class="">
                  <a href="#"><i class="fa fa-circle-o"></i> Configurables <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo url_for('tipo_habitacion/index'); ?>"><i class="fa fa-circle-o"></i> Tipo habitacion</a></li>
                    <li><a href="<?php echo url_for('tipo_cama/index'); ?>"><i class="fa fa-circle-o"></i> Opciones de cama</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo url_for('hospedaje/index'); ?>"><i class="fa fa-circle-o"></i> Hoteles</a></li>
              </ul>
              
              
            </li>
            
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Vehiculo</span> <i class="fa fa-angle-left pull-right"></i>
                </a>


                <ul class="treeview-menu">

                    <li class="">
                        <a href="#"><i class="fa fa-circle-o"></i> Configurables <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu" style="display: none;">
                            <li><a href="<?php echo url_for('vehiculo_tipo/index'); ?>"><i class="fa fa-circle-o"></i> Tipo</a></li>
                            <li><a href="<?php echo url_for('vehiculo_tipo_transmision/index'); ?>"><i class="fa fa-circle-o"></i> Tipo transmision</a></li>
                            <li><a href="<?php echo url_for('vehiculo_marca/index'); ?>"><i class="fa fa-circle-o"></i> Marca</a></li>
                            <li><a href="<?php echo url_for('vehiculo_marca_modelo/index'); ?>"><i class="fa fa-circle-o"></i> Modelo</a></li>
                            <li><a href="<?php echo url_for('vehiculo_tipo_reproductor/index'); ?>"><i class="fa fa-circle-o"></i> Tipo reproductor</a></li>
                            <li><a href="<?php echo url_for('vehiculo_politica/index'); ?>"><i class="fa fa-circle-o"></i> Politica</a></li>
                            <li><a href="<?php echo url_for('vehiculo_seguro/index'); ?>"><i class="fa fa-circle-o"></i> Seguro</a></li>
                            <li><a href="<?php echo url_for('vehiculo_adicional/index'); ?>"><i class="fa fa-circle-o"></i> Adicional</a></li>
                            <li><a href="<?php echo url_for('vehiculo_categoria/index'); ?>"><i class="fa fa-circle-o"></i> Categoria</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo url_for('vehiculo/index'); ?>"><i class="fa fa-circle-o"></i> Vehículos</a></li>
                </ul>


            </li>
            
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Seguro de Viaje</span> <i class="fa fa-angle-left pull-right"></i>
                </a>


                <ul class="treeview-menu">

                    <li class="">
                        <a href="#"><i class="fa fa-circle-o"></i> Configurables <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu" style="display: none;">
                            <li><a href="<?php echo url_for('seguro_tipo/index'); ?>"><i class="fa fa-circle-o"></i> Tipo</a></li>
                            <li><a href="<?php echo url_for('seguro_plan/index'); ?>"><i class="fa fa-circle-o"></i> Plan</a></li>
                            <li><a href="<?php echo url_for('seguro_beneficio/index'); ?>"><i class="fa fa-circle-o"></i> Beneficio</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo url_for('seguro/index'); ?>"><i class="fa fa-circle-o"></i> Seguros</a></li>
                </ul>


            </li>
            
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Excursion y Tour</span> <i class="fa fa-angle-left pull-right"></i>
                </a>


                <ul class="treeview-menu">

                    <li class="">
                        <a href="#"><i class="fa fa-circle-o"></i> Configurables <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu" style="display: none;">
                            <li><a href="<?php echo url_for('excursion_requisito/index'); ?>"><i class="fa fa-circle-o"></i> Requisito</a></li>
                            <li><a href="<?php echo url_for('excursion_politica/index'); ?>"><i class="fa fa-circle-o"></i> Política</a></li>
                            <li><a href="<?php echo url_for('excursion_lugar_interes/index'); ?>"><i class="fa fa-circle-o"></i> Lugar de Interés</a></li>
                            <li><a href="<?php echo url_for('excursion_adicional/index'); ?>"><i class="fa fa-circle-o"></i> Adicional</a></li>
                            <li><a href="<?php echo url_for('excursion_inclusion/index'); ?>"><i class="fa fa-circle-o"></i> Inclusión</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo url_for('excursion/index'); ?>"><i class="fa fa-circle-o"></i> Excursiones y Tours</a></li>
                </ul>


            </li>
            
<!--            <li class=" treeview">
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Bitacora</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 
                <li><a href="<?php echo url_for('tripulacion/index'); ?>"><i class="fa fa-circle-o"></i> Vuelos</a></li>
                
                
              
                
              </ul>
              
              
            </li>-->
            
            
            <li class="header">VENTAS</li>
           
            <li class=" treeview">
              <a href="#">
                <i class="fa fa-cloud"></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                 
                <li><a href="<?php echo url_for('cliente/index'); ?>"><i class="fa fa-circle-o"></i> Clientes</a></li>
                
                
              </ul> 
              </li>  
               <li class=" treeview"> 
                <a href="#">
                <i class="fa fa-cloud"></i> <span>Vuelos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 
                  <li class="">
                  <a href="#"><i class="fa fa-circle-o"></i> Configurables <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo url_for('tipo_tarifa/index'); ?>"><i class="fa fa-circle-o"></i> Tipo tarifa</a></li>
                  </ul>
                </li>
                  
                <li><a href="<?php echo url_for('vuelo/index'); ?>"><i class="fa fa-circle-o"></i> Globos</a></li>
<!--                <li><a href="<?php echo url_for('hotel/index'); ?>"><i class="fa fa-circle-o"></i> Vehiculos</a></li> 
                <li><a href="<?php echo url_for('hotel/index'); ?>"><i class="fa fa-circle-o"></i> Hoteles</a></li>
                <li><a href="<?php echo url_for('hotel/index'); ?>"><i class="fa fa-circle-o"></i> Restaurantes</a></li>-->
                
              </ul>
              
              
            </li>
           
            
            
            <?php //} ?>


          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<?php //} ?>
