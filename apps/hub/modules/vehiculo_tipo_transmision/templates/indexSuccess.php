<section class="content-header">
    
          <h1>
            VehiculoTipoTransmision
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">VehiculoTipoTransmisión</li>
          </ol>
        </section>

        <div style="">
          <a href="<?php echo url_for('vehiculo_tipo_transmision/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
                            <i class="fa fa-plus-circle"></i> Nuevo
                          </a>
        
        <div style="clear: both"></div>
        </div>
        <!-- Main content -->
        <section class="content">
            
        
        <?php if ($sf_user->hasFlash('noeliminar')){ ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    <?php echo $sf_user->getFlash('noeliminar'); ?>
                  </div>
        <?php }?>    
            
        <?php if ($sf_user->hasFlash('eliminar')){ ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Exitosa</h4>
                    <?php echo $sf_user->getFlash('eliminar'); ?>
                 </div>
        <?php }?>
            
            
          <div class="row">
            <div class="col-xs-12">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de tipos de transmisiones de vehiculos del catalago</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="lista" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        
                        
                        <th>Nombre(s)</th>
                        <th>Status</th>
                        <th>Descripción</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vehiculo_tipo_transmisiones as $vehiculo_tipo_transmision) { ?>
                      <tr>
                        
                        
                        <td><?php echo $vehiculo_tipo_transmision->getNombre(); ?></td>
                        <td>
                            <span class="label label-<?php if($vehiculo_tipo_transmision->getStatus()==0) echo "danger"; else echo "success"; ?>">
                                <?php echo VehiculoTipoTransmision::$status[$vehiculo_tipo_transmision->getStatus()]; ?>
                            </span>
                            </td>
                        <td><?php echo $vehiculo_tipo_transmision->getDescripcion(); ?></td>
                        <td>
                            
                            
                            <div class="btn-group" style="float: right">
                                    <button type="button" class="btn btn-default">Acciones</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo url_for('vehiculo_tipo_transmision/edit?id='.$vehiculo_tipo_transmision->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar vehiculo_tipo_transmision', 'vehiculo_tipo_transmision/delete?id='.$vehiculo_tipo_transmision->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
                                      </li>
                                    </ul>
                            </div>
                            </td>
                      </tr>
                        <?php  } ?>
                      
                      
                      
                    <tfoot>
                      <tr>
                         
                        
                        <th>Nombre(s)</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      


