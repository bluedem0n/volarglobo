<!-- Main content -->
        <section class="content">
            
                      
         <?php if ($sf_user->hasFlash('notice')){ ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Exitosa</h4>
                    <?php echo $sf_user->getFlash('notice'); ?>
                 </div>
          
        <?php }if ($sf_user->hasFlash('error')){ ?>
 
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    <?php echo $sf_user->getFlash('error'); ?>
                  </div>
        <?php }?>
            
            
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                
                
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/hub_dev.php/vehiculo_marca_modelo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                                
              
                
                <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos</a></li>
                  
                  
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
                       <!-- form start -->
                
                  <div class="box-body">                      
                    
                      
                    <div class="form-group  col-md-4 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nombre</label>
                      <?php  echo $form['nombre'];?>
                    </div>
                      
                        <div class="form-group  col-md-4">
                      <label for="status">Estatus</label>
                      <?php echo $form['status']->renderError() ?>
                      <?php  echo $form['status'];?>
                      </div>
                      
                      <div class="form-group col-md-4 <?php if ($form['vehiculo_marca_id']->renderError()) echo "has-error"; ?>">
                          <label for="vehiculo_marca_id"><?php if ($form['vehiculo_marca_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Tipo de marca:</label>
                          <?php echo $form['vehiculo_marca_id']; ?>
                      </div>
                      
                      <div class="form-group  col-md-4 <?php if ($form['capacidad_persona']->renderError()) echo "has-error"; ?>">
                          <label for="capacidad_persona"><?php if ($form['capacidad_persona']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Cantidad personas:</label>
                          <?php echo $form['capacidad_persona']; ?>
                      </div>
                      
                      <div class="form-group  col-md-4 <?php if ($form['cantidad_puerta']->renderError()) echo "has-error"; ?>">
                          <label for="cantidad_puerta"><?php if ($form['cantidad_puerta']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Cantidad puertas:</label>
                          <?php echo $form['cantidad_puerta']; ?>
                      </div>
                      
                      <div class="form-group  col-md-4 <?php if ($form['capacidad_maleta']->renderError()) echo "has-error"; ?>">
                          <label for="capacidad_maleta"><?php if ($form['capacidad_maleta']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Cantidad maletas:</label>
                          <?php echo $form['capacidad_maleta']; ?>
                      </div>
                      
                       <div class="form-group  col-md-12">
                      <label for="descripcion">Descripción breve</label>
                      <?php  echo $form['descripcion'];?>
                        </div>
                    
                   
                      <div style="clear: both"></div>
                       <div class="box-footer">
                   <?php echo $form->renderHiddenFields(false) ?>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </div>
                    
                    
                  </div><!-- /.box-body -->
                   </div>
                    
                    
                    
                    
                 </div>
                 </div>
                
                

                
               

                  
                
                    
               
             
            </form>
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      
