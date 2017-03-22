<section class="content-header">
    
          <h1>
            Vuelos - cliente
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Vuelos - cliente</li>
          </ol>
        </section>

        <div style="">
        <a href="<?php echo url_for('/vuelo/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
            <i class="fa fa-plus-circle"></i> Nuevo
        </a>
       
        <div style="clear: both"></div>
        </div>

        <!-- Main content -->
        <section class="content">
            
        
        <?php if ($sf_user->hasFlash('error')){ ?>
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
              
              
<!--                  <div class="input-group">
                        
                        <select class="form-control pull-right">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                      <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar proveedor">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>-->
                
          
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Vuelos - cliente</h3>
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <form action="<?php echo url_for('vuelo/index')?>" method="post">
                            
                                
                                <input  type="submit" value="Filtrar"  name="buscar_proveedor" id="submit"  class="btn btn-primary pull-right btn-sm"/>
                                
                                <?php //echo $filtro['nombre']; ?>
                                
                              </form>  
                                
                                
                        
                    </div>
                </div>
                
                
                </div><!-- /.box-header -->
                
                <div class="box-body  no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th style="text-align: center;">Status</th>
                      <th>Tipo vuelo</th>
                      <th>Motivo</th>
                      <th style="text-align: center;">Cant Personas</th>
                      <th>Fecha</th>
                      <th>Horario</th>
                      <th></th>
                    </tr>
                    <?php foreach ($proveedor_vuelos as $descuento) { ?>
                    <tr>
                        <td style="text-align: center;">
                            <?php echo $descuento->getStatus(); ?>
                        </td>
                        <td >
                            <?php echo $descuento->getTipoVuelo(); ?>
                        </td>
                        
                        <td >
                            <?php echo $descuento->getTipoMotivo(); ?>
                        </td>
                        <td style="text-align: center;" >
                            <?php echo count($descuento->getVueloCliente()); ?>
                        </td>
                        
                        <td >
                            <?php echo $descuento->getFechaActivacion(); ?>
                        </td>
                        
                        <td >
                            <?php echo $descuento->getHorario(); ?>
                        </td>
                        
                        
                      <td>
                          
                          <div class="btn-group" style="float: right">
                                    <button type="button" class="btn btn-default">Acciones</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        
                                        
              <?php if($descuento->getStatus()==2){ ?>
                <li><a href="<?php echo url_for('vuelo/status?cambia=1&id='.$descuento->getId()); ?>"><i class="fa fa-fw fa-thumbs-up" style="cursor: pointer; color: green" title="Aprobar"></i>Aprobar</a></li>
                <?php }elseif($descuento->getStatus()==1){ ?>
                <li><a href="<?php echo url_for('vuelo/status?cambia=2&id='.$descuento->getId()); ?>"><i class="fa fa-fw fa-thumbs-down" style="cursor: pointer; color: red" title="Rechazado"></i>Rechazar</a></li>
                <?php }elseif($descuento->getStatus()==0){ ?>
                <li><a href="<?php echo url_for('vuelo/status?cambia=1&id='.$descuento->getId()); ?>"><i class="fa fa-fw fa-thumbs-up" style="cursor: pointer; color: green" title="Aprobar"></i>Aprobar</a></li>
                <li><a href="<?php echo url_for('vuelo/status?cambia=2&id='.$descuento->getId()); ?>"><i class="fa fa-fw fa-thumbs-down" style="cursor: pointer; color: red" title="Rechazado"></i>Rechazar</a></li>
                
                <?php }?>  
                                      
                                      
                                      <li><a href="<?php echo url_for('vuelo/edit?id='.$descuento->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar proveedor', 'vuelo/delete?id='.$descuento->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
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
                    <?php if ($proveedor_vuelos->haveToPaginate()): ?>
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><?php echo link_to('«', 'vuelo/index?page_proveedor='.$proveedor_vuelos->getFirstPage()) ?></li>
                    <li><?php echo link_to('&lt;', 'vuelo/index?page_proveedor='.$proveedor_vuelos->getPreviousPage()) ?></li>
                    <?php $links = $proveedor_vuelos->getLinks();
                            foreach ($links as $page_proveedor): ?>
                            <?php echo ($page_proveedor == $proveedor_vuelos->getPage()) ? "<li><a style='background: #222d32;color: #fff'>".$page_proveedor."</a></li>" : "<li>".link_to($page_proveedor, 'vuelo/index?page_proveedor='.$page_proveedor).'</li>' ?>
                            <?php if ($page_proveedor != $proveedor_vuelos->getCurrentMaxLink()): ?> <?php endif ?>
                            <?php endforeach ?>
                    <li><?php echo link_to('&gt;', 'vuelo/index?page_proveedor='.$proveedor_vuelos->getNextPage()) ?></li>
                    <li><?php echo link_to('»', 'vuelo/index?page_proveedor='.$proveedor_vuelos->getLastPage()) ?></li>
                  </ul>
                    <?php endif ?>
                </div>
                


              </div>
                
                
            </div><!-- /.col -->
          </div><!-- /.row -->
          
          
        </section><!-- /.content -->
      


