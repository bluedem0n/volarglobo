<section class="content-header">
    
          <h1>
            Proveedores
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Proveedores</li>
          </ol>
        </section>

        <div style="">
        <a href="<?php echo url_for('proveedor/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
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
                  <h3 class="box-title">Listado de proveedores</h3>
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <form action="<?php echo url_for('proveedor/index')?>" method="post">
                            
                                
                                <input  type="submit" value="Filtrar"  name="buscar_proveedor" id="submit"  class="btn btn-primary pull-right btn-sm"/>
                                
                                <?php echo $filtro['nombre']; ?>
                                
                              </form>  
                                
                                
                        
                    </div>
                </div>
                
                
                </div><!-- /.box-header -->
                
                <div class="box-body  no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Nombre proveedor (nickname)</th>
                      <th>Teléfonos</th>
                      <th>Contacto</th>
                      <th></th>
                    </tr>
                    <?php foreach ($proveedores as $proveedor) { ?>
                    <tr>
                        <td>
                            <?php echo $proveedor->getNombre(); ?><br>
                            <?php 
                            if($proveedor->getNickname())
                            echo ucfirst(strtolower($proveedor->getNickname()))."<br>"; ?>
                            <?php echo $proveedor->getRif(); ?>
                        </td>
                        <td><?php 
                            if($proveedor->getTelefono1())
                            echo $proveedor->getTelefono1()."<br>"; ?>
                            <?php 
                            if($proveedor->getTelefono2())
                            echo $proveedor->getTelefono2()."<br>"; ?>
                            <?php 
                            if(($proveedor->getEmail())&&($proveedor->getEmail()<>'solicitar@solicitar.com'))
                            echo strtolower($proveedor->getEmail())."<br>"; ?>
                        </td>
                        
                        <td><?php 
                        if($proveedor->getContactoNombre())
                        echo "Contacto: ".ucwords(strtolower($proveedor->getContactoNombre()))."<br>"; ?>
                            <?php 
                            if($proveedor->getContactoPuesto())
                            echo "Tefl: ".ucfirst(strtolower($proveedor->getContactoPuesto()))."<br>"; ?>
                            
                        </td>
                        
                      <td>
                          
                          <div class="btn-group" style="float: right">
                                    <button type="button" class="btn btn-default">Acciones</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo url_for('proveedor/edit?id='.$proveedor->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar proveedor', 'proveedor/delete?id='.$proveedor->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
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
                    <?php if ($proveedores->haveToPaginate()): ?>
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><?php echo link_to('«', 'proveedor/index?page_proveedor='.$proveedores->getFirstPage()) ?></li>
                    <li><?php echo link_to('&lt;', 'proveedor/index?page_proveedor='.$proveedores->getPreviousPage()) ?></li>
                    <?php $links = $proveedores->getLinks();
                            foreach ($links as $page_proveedor): ?>
                            <?php echo ($page_proveedor == $proveedores->getPage()) ? "<li><a style='background: #222d32;color: #fff'>".$page_proveedor."</a></li>" : "<li>".link_to($page_proveedor, 'proveedor/index?page_proveedor='.$page_proveedor).'</li>' ?>
                            <?php if ($page_proveedor != $proveedores->getCurrentMaxLink()): ?> <?php endif ?>
                            <?php endforeach ?>
                    <li><?php echo link_to('&gt;', 'proveedor/index?page_proveedor='.$proveedores->getNextPage()) ?></li>
                    <li><?php echo link_to('»', 'proveedor/index?page_proveedor='.$proveedores->getLastPage()) ?></li>
                  </ul>
                    <?php endif ?>
                </div>
                


              </div>
                
                
            </div><!-- /.col -->
          </div><!-- /.row -->
          
          
        </section><!-- /.content -->
      


