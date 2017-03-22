<section class="content-header">
    
          <h1>
            corregimiento
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo url_for('dashboard/index')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">corregimientos</li>
          </ol>
        </section>
        
        <div style="">
          <a href="<?php echo url_for('corregimiento/new')?>"  class="btn  btn-social btn-dropbox" style="float: right;  width: 110px; margin-left: 5px; margin-right: 15px">
                            <i class="fa fa-plus-circle"></i> Nuevo
                          </a>
          
         <a href="<?php echo url_for('exportar/email')?>" class="btn  btn-social btn-google-plus" style="float: right; width: 110px; margin-left: 5px">
            <i class="fa fa-envelope"></i> Email
        </a>
        
        <a href="<?php echo url_for('exportar/pdf')?>" target="_blank" class="btn  btn-social btn-google-plus" style="float: right; width: 110px; margin-left: 5px">
            <i class="fa fa-download"></i> PDF
        </a>
          
        <a href="<?php echo url_for('exportar/excel')?>" class="btn  btn-social btn-google-plus" style="float: right; width: 145px; margin-left: 5px">
            <i class="fa fa-table"></i> Exportar excel
        </a>
          
        <!--  <a href="<?php echo url_for('importar/excel')?>" class="btn  btn-social btn-bitbucket" style="float: right; width: 145px; margin-left: 5px">
            <i class="fa fa-table"></i> Importar excel
        </a>-->

        <a href="<?php echo url_for('imprimir/imprimir')?>"  target="_blank" class="btn  btn-social btn-github" style="float: right;  width: 110px; margin-left: 5px">
            <i class="fa fa-print"></i> Imprimir
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
                  <h3 class="box-title">Listado de los corregimientos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="lista" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        
                        
                        <th>Provincia(s)</th>
                        <th>provincia(s)</th>
                        <th>distrito(s)</th>
                        <th>Nombre(s)</th>
                        <th>Status(s)</th>                   
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($parroquias as $parroquia) { ?>
                      <tr>
                        
                        
                        <td><?php echo $parroquia->getProvincia(); ?></td>
                        <td><?php echo $parroquia->getCiudad(); ?></td>
                        <td><?php echo $parroquia->getMunicipio(); ?></td>
                        <td><?php echo $parroquia->getNombre(); ?></td>
                        <td><span class="label label-<?php if($parroquia->getStatus()==0) echo "danger"; else echo "success"; ?>">
                                <?php echo Categoria::$status[$parroquia->getStatus()]; ?>
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
                                        <li><a href="<?php echo url_for('corregimiento/edit?id='.$parroquia->getId()); ?>">Editar</a></li>
                                      <li class="divider"></li>
                                      <li><?php echo link_to('Eliminar corregimiento', 'corregimiento/delete?id='.$parroquia->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro?', 'style' => 'color:red;'));?>
                                      </li>
                                    </ul>
                            </div>
                            </td>
                      </tr>
                        <?php  } ?>
                      
                      
                      
                    <tfoot>
                      <tr>
                         
                        
                        <th>Provincia(s)</th>
                        <th>provincia(s)</th>
                        <th>distrito(s)</th>
                        <th>Nombre(s)</th>
                        <th>Status(s)</th>
                        
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
                
                <!--Paginacion de Parroquia ------------------------------------------------>
                
                <div class="box-footer clearfix">
                    <?php if ($parroquias->haveToPaginate()): ?>
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><?php echo link_to('«', 'corregimiento/index?page_corregimiento='.$parroquias->getFirstPage()) ?></li>
                    <li><?php echo link_to('&lt;', 'corregimiento/index?page_corregimiento='.$parroquias->getPreviousPage()) ?></li>
                    <?php $links = $parroquias->getLinks();
                            foreach ($links as $page_corregimiento): ?>
                            <?php echo ($page_corregimiento == $parroquias->getPage()) ? "<li><a style='background: #222d32;color: #fff'>".$page_corregimiento."</a></li>" : "<li>".link_to($page_corregimiento, 'corregimiento/index?page_corregimiento='.$page_corregimiento).'</li>' ?>
                            <?php if ($page_corregimiento != $parroquias->getCurrentMaxLink()): ?> <?php endif ?>
                            <?php endforeach ?>
                    <li><?php echo link_to('&gt;', 'corregimiento/index?page_corregimiento='.$parroquias->getNextPage()) ?></li>
                    <li><?php echo link_to('»', 'corregimiento/index?page_corregimiento='.$parroquias->getLastPage()) ?></li>
                  </ul>
                    <?php endif ?>
                </div>
                
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      

