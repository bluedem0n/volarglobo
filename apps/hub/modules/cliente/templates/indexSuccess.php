<section class="content-header">
    
          <h1>
            Clientes
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Clientes</li>
          </ol>
        </section>

<div style="">
          <a href="<?php echo url_for('cliente/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
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
                  <h3 class="box-title">Listado de clientes</h3>
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <form action="<?php echo url_for('cliente/index')?>" method="post">
                            
                                
                                <input  type="submit" value="Filtrar"  name="buscar_cliente" id="submit"  class="btn btn-primary pull-right btn-sm"/>
                                
                                <?php //echo $filtro['nombre']; ?>
                                
                              </form>  
                                
                                
                        
                    </div>
                </div>
                
                
                </div><!-- /.box-header -->
                
                <div class="box-body  no-padding">
                  <table class="table table-hover">
                    <tbody>
                   <tr>
                      <th>Nombre cliente (nickname)</th>
                      <th>Franquicia</th>
                      <th>Telefonos</th>
                      <th>Contacto</th>
                      <th></th>
                    </tr>
                    <?php foreach ($clientes as $cliente) { ?>
                    <tr>
                        <td>
                            <?php echo ucfirst(strtolower($cliente->getNombre())); ?> <?php echo ucfirst(strtolower($cliente->getApellido())); ?><br>
                            <?php echo $cliente->getDni(); ?>
                            
                        </td>
                        <td><?php echo $cliente->getEmpresa(); ?><br>
                        <td><?php echo $cliente->getTelefonoPrincipal(); ?>
                            
                        </td>
                        
                        <td><?php echo ucwords(strtolower($cliente->getEmail())); ?>
                        </td>
                        
                      <td>
                          
                          <div class="btn-group" style="float: right">
                                    <button type="button" class="btn btn-default">Acciones</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo url_for('cliente/edit?id='.$cliente->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar cliente', 'cliente/delete?id='.$cliente->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
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
                    <?php if ($clientes->haveToPaginate()): ?>
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><?php echo link_to('«', 'cliente/index?page_cliente='.$clientes->getFirstPage()) ?></li>
                    <li><?php echo link_to('&lt;', 'cliente/index?page_cliente='.$clientes->getPreviousPage()) ?></li>
                    <?php $links = $clientes->getLinks();
                            foreach ($links as $page_cliente): ?>
                            <?php echo ($page_cliente == $clientes->getPage()) ? "<li><a style='background: #222d32;color: #fff'>".$page_cliente."</a></li>" : "<li>".link_to($page_cliente, 'cliente/index?page_cliente='.$page_cliente).'</li>' ?>
                            <?php if ($page_cliente != $clientes->getCurrentMaxLink()): ?> <?php endif ?>
                            <?php endforeach ?>
                    <li><?php echo link_to('&gt;', 'cliente/index?page_cliente='.$clientes->getNextPage()) ?></li>
                    <li><?php echo link_to('»', 'cliente/index?page_cliente='.$clientes->getLastPage()) ?></li>
                  </ul>
                    <?php endif ?>
                </div>
                


              </div>
                
                
            </div><!-- /.col -->
          </div><!-- /.row -->
          
          
        </section><!-- /.content -->
      
