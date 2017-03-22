<section class="content-header">
    
          <h1>
            Tanquees
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tanquees</li>
          </ol>
        </section>

<div style="">
          <a href="<?php echo url_for('tanque/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
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
                  <h3 class="box-title">Listado de tanquees</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="lista" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Marca(s)</th>
                        <th>Modelo(s)</th>
                        <th>Número serie(s)</th>
                        <th>Ultim(s)</th>
                        <th>Prox Mantenimiento(s)</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tanquees as $tanque) { ?>
                      <tr>
                        
                        
                        <td><?php echo $tanque->getMarca(); ?></td>
                        <td><?php echo $tanque->getModelo(); ?></td>
                        <td><?php echo $tanque->getNumeroSerie(); ?></td>
                        <td><?php echo $tanque->getMantenimientoUltimo(); ?></td>
                        <td><?php echo $tanque->getMantenimientoProximo(); ?></td>
                        <td>
                            <div class="btn-group" style="float: right">
                                    <button type="button" class="btn btn-default">Acciones</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo url_for('tanque/edit?id='.$tanque->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar tanque', 'tanque/delete?id='.$tanque->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
                                      </li>
                                    </ul>
                            </div>
                            </td>
                      </tr>
                        <?php  } ?>
                      
                      
                      
                    <tfoot>
                      <tr>
                         <th>Marca(s)</th>
                        <th>Modelo(s)</th>
                        <th>Número serie(s)</th>
                        <th>Ulti(s)</th>
                        <th>Prox Mantenimiento(s)</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      


