<section class="content-header">
    
          <h1>
            Tripulaciones
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tripulaciones</li>
          </ol>
        </section>

<div style="">
          <a href="<?php echo url_for('tripulacion/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
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
                  <h3 class="box-title">Listado de tripulaciones</h3>
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <form action="<?php echo url_for('tripulacion/index')?>" method="post">
                            
                                
                                <input  type="submit" value="Filtrar"  name="buscar_tripulacion" id="submit"  class="btn btn-primary pull-right btn-sm"/>
                                
                                <?php //echo $filtro['nombre']; ?>
                                
                              </form>  
                                
                                
                        
                    </div>
                </div>
                
                
                </div><!-- /.box-header -->
                
                <div class="box-body  no-padding">
                  <table class="table table-hover">
                    <tbody>
                   <tr>
                      <th>Nombre tripulacion (nickname)</th>
                      <th>Franquicia</th>
                      <th>Telefonos</th>
                      <th>Contacto</th>
                      <th></th>
                    </tr>
                    <?php foreach ($tripulaciones as $tripulacion) { ?>
                    <tr>
                        <td>
                            <?php echo ucfirst(strtolower($tripulacion->getFirstName())); ?> <?php echo ucfirst(strtolower($tripulacion->getLastName())); ?><br>
                            (<?php echo $tripulacion->getUsername(); ?>)<br>
                            <?php echo $tripulacion->getIdentificacion(); ?>
                            
                        </td>
                        <td><?php echo $tripulacion->getEmpresa(); ?><br>
                        <td><?php echo $tripulacion->getTelefonoPrincipal(); ?>
                            
                        </td>
                        
                        <td><?php echo ucwords(strtolower($tripulacion->getEmailAddress())); ?>
                        </td>
                        
                      <td>
                          
                          <div class="btn-group" style="float: right">
                                    <button type="button" class="btn btn-default">Acciones</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo url_for('tripulacion/edit?id='.$tripulacion->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar tripulacion', 'tripulacion/delete?id='.$tripulacion->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
                                      </li>
                                    </ul>
                            </div>
                          
                      </td>
                    </tr>
                    <?php  } ?>
                  </tbody></table>
                </div><!-- /.box-body -->
                
<!--Paginacion de Proveedores ------------------------------------------------>
                
                <div class="box-footer clearfix">
                    <?php if ($tripulaciones->haveToPaginate()): ?>
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><?php echo link_to('«', 'tripulacion/index?page_tripulacion='.$tripulaciones->getFirstPage()) ?></li>
                    <li><?php echo link_to('&lt;', 'tripulacion/index?page_tripulacion='.$tripulaciones->getPreviousPage()) ?></li>
                    <?php $links = $tripulaciones->getLinks();
                            foreach ($links as $page_tripulacion): ?>
                            <?php echo ($page_tripulacion == $tripulaciones->getPage()) ? "<li><a style='background: #222d32;color: #fff'>".$page_tripulacion."</a></li>" : "<li>".link_to($page_tripulacion, 'tripulacion/index?page_tripulacion='.$page_tripulacion).'</li>' ?>
                            <?php if ($page_tripulacion != $tripulaciones->getCurrentMaxLink()): ?> <?php endif ?>
                            <?php endforeach ?>
                    <li><?php echo link_to('&gt;', 'tripulacion/index?page_tripulacion='.$tripulaciones->getNextPage()) ?></li>
                    <li><?php echo link_to('»', 'tripulacion/index?page_tripulacion='.$tripulaciones->getLastPage()) ?></li>
                  </ul>
                    <?php endif ?>
                </div>
                


              </div>
                
                
            </div><!-- /.col -->
          </div><!-- /.row -->
          
          
        </section><!-- /.content -->
      
