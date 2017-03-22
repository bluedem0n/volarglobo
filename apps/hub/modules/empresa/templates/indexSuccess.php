<section class="content-header">
    
          <h1>
            Empresas
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Empresas</li>
          </ol>
        
        
        </section>

      <div style="">
          <a href="<?php echo url_for('empresa/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
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
                  <h3 class="box-title">Listado de empresas</h3>
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <form action="<?php echo url_for('empresa/index')?>" method="post">
                            
                                
                                <!--<input  type="submit" value="Filtrar"  name="buscar_empresa" id="submit"  class="btn btn-primary pull-right btn-sm"/>-->
                                
                                <?php //echo $filtro['nombre']; ?>
                                
                                
                                
                              </form>  
                                
                                
                        
                    </div>
                </div>
                
                
                </div><!-- /.box-header -->
                
                <div class="box-body  no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Nombre empresa (nickname)</th>
                      <th>Teléfonos</th>
                      <th>Contacto</th>
                      <th></th>
                    </tr>
                    <?php foreach ($empresas as $empresa) { ?>
                    <tr>
                        <td>
                            <?php echo ucfirst(strtolower($empresa->getNombre())); ?><br>
                            <?php echo ucfirst(strtolower($empresa->getNickname())); ?><br>
                            <?php echo $empresa->getRif(); ?>
                        </td>
                        <td><?php echo $empresa->getTelefono1(); ?><br>
                            <?php echo $empresa->getTelefono2(); ?>
                        </td>
                        
                        <td><?php echo ucwords(strtolower($empresa->getContactoNombre())); ?><br>
                            <?php echo ucfirst(strtolower($empresa->getContactoPuesto())); ?>
                        </td>
                        
                      <td>
                          
                          <div class="btn-group" style="float: right">
                                    <button type="button" class="btn btn-default">Acciones</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo url_for('empresa/edit?id='.$empresa->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar empresa', 'empresa/delete?id='.$empresa->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
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
                    <?php if ($empresas->haveToPaginate()): ?>
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><?php echo link_to('«', 'empresa/index?page_empresa='.$empresas->getFirstPage()) ?></li>
                    <li><?php echo link_to('&lt;', 'empresa/index?page_empresa='.$empresas->getPreviousPage()) ?></li>
                    <?php $links = $empresas->getLinks();
                            foreach ($links as $page_empresa): ?>
                            <?php echo ($page_empresa == $empresas->getPage()) ? "<li><a style='background: #222d32;color: #fff'>".$page_empresa."</a></li>" : "<li>".link_to($page_empresa, 'empresa/index?page_empresa='.$page_empresa).'</li>' ?>
                            <?php if ($page_empresa != $empresas->getCurrentMaxLink()): ?> <?php endif ?>
                            <?php endforeach ?>
                    <li><?php echo link_to('&gt;', 'empresa/index?page_empresa='.$empresas->getNextPage()) ?></li>
                    <li><?php echo link_to('»', 'empresa/index?page_empresa='.$empresas->getLastPage()) ?></li>
                  </ul>
                    <?php endif ?>
                </div>
                


              </div>
                
                
            </div><!-- /.col -->
          </div><!-- /.row -->
          
          
        </section><!-- /.content -->
      



    