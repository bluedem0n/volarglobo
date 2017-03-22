<section class="content-header">
    
          <h1>
            Hospedajes
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Hospedajes</li>
          </ol>
        </section>

        <div style="">
        <a href="<?php echo url_for('hospedaje/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
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
                  <h3 class="box-title">Listado de hospedajes</h3>
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <form action="<?php echo url_for('hospedaje/index')?>" method="post">
                            
                                
                                <input  type="submit" value="Filtrar"  name="buscar_hospedaje" id="submit"  class="btn btn-primary pull-right btn-sm"/>
                                
                                <?php echo $filtro['nombre']; ?>
                                
                              </form>  
                                
                                
                        
                    </div>
                </div>
                
                
                </div><!-- /.box-header -->
                
                <div class="box-body  no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Nombre hospedaje (nickname)</th>
                      <th>Teléfonos</th>
                      <th>Contacto</th>
                      <th></th>
                    </tr>
                    <?php foreach ($hospedajes as $hospedaje) { ?>
                    <tr>
                        <td>
                            <?php echo $hospedaje->getNombre(); ?><br>
                            <?php 
                            if($hospedaje->getNickname())
                            echo ucfirst(strtolower($hospedaje->getNickname()))."<br>"; ?>
                            <?php echo $hospedaje->getRif(); ?>
                        </td>
                        <td><?php 
                            if($hospedaje->getTelefono1())
                            echo $hospedaje->getTelefono1()."<br>"; ?>
                            <?php 
                            if($hospedaje->getTelefono2())
                            echo $hospedaje->getTelefono2()."<br>"; ?>
                            <?php 
                            if(($hospedaje->getEmail())&&($hospedaje->getEmail()<>'solicitar@solicitar.com'))
                            echo strtolower($hospedaje->getEmail())."<br>"; ?>
                        </td>
                        
                        <td><?php 
                        if($hospedaje->getContactoNombre())
                        echo "Contacto: ".ucwords(strtolower($hospedaje->getContactoNombre()))."<br>"; ?>
                            <?php 
                            if($hospedaje->getContactoPuesto())
                            echo "Tefl: ".ucfirst(strtolower($hospedaje->getContactoPuesto()))."<br>"; ?>
                            
                        </td>
                        
                      <td>
                          
                          <div class="btn-group" style="float: right">
                                    <button type="button" class="btn btn-default">Acciones</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo url_for('hospedaje/edit?id='.$hospedaje->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar hospedaje', 'hospedaje/delete?id='.$hospedaje->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
                                      </li>
                                    </ul>
                            </div>
                          
                      </td>
                    </tr>
                    <?php  } ?>
                  </tbody></table>
                </div><!-- /.box-body -->
                
<!--Paginacion de Hospedajes ------------------------------------------------>
                
                <div class="box-footer clearfix">
                    <?php if ($hospedajes->haveToPaginate()): ?>
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><?php echo link_to('«', 'hospedaje/index?page_hospedaje='.$hospedajes->getFirstPage()) ?></li>
                    <li><?php echo link_to('&lt;', 'hospedaje/index?page_hospedaje='.$hospedajes->getPreviousPage()) ?></li>
                    <?php $links = $hospedajes->getLinks();
                            foreach ($links as $page_hospedaje): ?>
                            <?php echo ($page_hospedaje == $hospedajes->getPage()) ? "<li><a style='background: #222d32;color: #fff'>".$page_hospedaje."</a></li>" : "<li>".link_to($page_hospedaje, 'hospedaje/index?page_hospedaje='.$page_hospedaje).'</li>' ?>
                            <?php if ($page_hospedaje != $hospedajes->getCurrentMaxLink()): ?> <?php endif ?>
                            <?php endforeach ?>
                    <li><?php echo link_to('&gt;', 'hospedaje/index?page_hospedaje='.$hospedajes->getNextPage()) ?></li>
                    <li><?php echo link_to('»', 'hospedaje/index?page_hospedaje='.$hospedajes->getLastPage()) ?></li>
                  </ul>
                    <?php endif ?>
                </div>
                


              </div>
                
                
            </div><!-- /.col -->
          </div><!-- /.row -->
          
          
        </section><!-- /.content -->
      


