<section class="content-header">
    
          <h1>
            Ciudades
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ciudades</li>
          </ol>
        </section>

        <div style="">
          <a href="<?php echo url_for('ciudad/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
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
                  <h3 class="box-title">Listado de Ciudades</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="lista" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Provincia(s)</th>
                        <th>Nombre(s)</th>
                        <th>Status(s)</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ciudades as $ciudad) { ?>
                      <tr>
                        
                        <td><?php echo $ciudad->getProvincia(); ?></td>
                        <td><?php echo $ciudad->getNombre(); ?></td>
                        <td><span class="label label-<?php if($ciudad->getStatus()==0) echo "danger"; else echo "success"; ?>">
                                <?php echo Categoria::$status[$ciudad->getStatus()]; ?>
                            </span>
                        </td>
                  
                        <td>
                            <div class="btn-group" style="float: right">
                                    <button type="button" class="btn btn-default">Acciones</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo url_for('ciudad/edit?id='.$ciudad->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar Ciudades', 'ciudad/delete?id='.$ciudad->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
                                      </li>
                                    </ul>
                            </div>
                            </td>
                      </tr>
                        <?php  } ?>
                      
                    <tfoot>
                      <tr>
                         
                        
                        <th>Provincia(s)</th>
                        <th>Nombre(s)</th>
                        <th>Status(s)</th>
                        
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      


