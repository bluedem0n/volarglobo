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
                
                 <!-- form start -->
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/quemador/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                
                 <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos basicos</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Mantenimiento</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Obervaciones</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
                      <div class="box-body">
                    
                      
                      <div class="form-group col-md-4 <?php if($form['marca_id']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['marca_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Marca</label>
                      <?php  echo $form['marca_id'];?>
                    </div>
                      
                    <div class="form-group col-md-4 <?php if($form['modelo']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['modelo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Modelo</label>
                      <?php  echo $form['modelo'];?>
                    </div>
                      
                  
                      
                    <div class="form-group col-md-4 <?php if($form['numero_serie']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['numero_serie']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Número de serie</label>
                      <?php  echo $form['numero_serie'];?>
                    </div>
                     
                      <div style="clear: both"></div>    
                      
                  
                      
                  </div><!-- /.box-body -->
                      
                      
                      
              </div><!-- /.tab-content -->
              
              
                     
              <div class="tab-pane" id="tab_2">
                    
              <div class="box-body">
                  
                  
                  
                  <div class="form-group col-md-4 <?php if($form['mantenimiento_proximo']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['mantenimiento_proximo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Proximo mantenimiento</label>
                      <?php  echo $form['mantenimiento_proximo'];?>
                    </div>
                  <div style="clear: both"></div> 
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody id='extramantenimientos'>
                     <tr >
                      <th>Fecha mantenimiento</th>
                      <th>observacion</th>
                      <th>Realizado por</th>
                    </tr>
                    <?php if($form->getObject()->isNew()){ ?>
                    <?php for($i=0;$i<count($form['mantenimientos']);$i++){ ?>
                    <tr  id="mantenimientos<?php echo $i ?>">
                      <td><?php echo $form['mantenimientos'][$i]['fecha'] ?></td>
                      <td><?php echo $form['mantenimientos'][$i]['observacion'] ?></td>
                      <td><?php echo $form['mantenimientos'][$i]['realizado_por'] ?></td>
                    </tr>
                    <?php }}else { ?>
                    <?php foreach ($form->getObject()->getMantenimientoQuemador() as $mantenimiento){ ?>
                    <tr  id="mantenimientos<?php echo $i ?>">
                      <td><?php echo $mantenimiento->getFecha(); ?></td>
                      <td><?php echo $mantenimiento->getObservacion(); ?></td>
                      <td><?php echo $mantenimiento->getRealizadoPor(); ?></td>
                    </tr>
                    <?php }}?>
                  </tbody></table>
                </div><!-- /.box-body -->
                            
                  
                  
                  
                  
                  </div>
                  </div><!-- /.tab-content -->
                  
              
                  
                  <div class="tab-pane" id="tab_3">
                    
                        <div class="box-body">
                            
                            <div class="form-group col-md-12 <?php if($form['observaciones']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['observaciones']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
                      <?php  echo $form['observaciones'];?>
                    </div>
                            <div style="clear: both"></div> 
                        </div>
                    </div><!-- /.tab-content -->
              </div>
                     
               <div class="box-footer">
                   <?php echo $form->renderHiddenFields(false) ?>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </div>
                </form>
                     
           
             
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->  
            
            
          
      
