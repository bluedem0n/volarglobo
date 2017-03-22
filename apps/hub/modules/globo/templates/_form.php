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
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/globo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                
                 <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos basicos</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Canastilla / Quemador</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Tanques</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Multimedia</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Mantenimiento</a></li>
                  <li><a href="#tab_6" data-toggle="tab">Obervaciones</a></li>
                  
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
                      <label for="nombre"><?php if($form['numero_serie']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Número serie</label>
                      <?php  echo $form['numero_serie'];?>
                    </div> 
                          
                      
                     
                      
                    <div class="form-group col-md-8 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nombre</label>
                      <?php  echo $form['nombre'];?>
                    </div>
                      
                  
                      
                    <div class="form-group col-md-4 <?php if($form['status']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['status']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Status</label>
                      <?php  echo $form['status'];?>
                    </div>
                     
                           <div class="form-group col-md-4 <?php if($form['ubicacion_id']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['ubicacion_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Ubicación</label>
                      <?php  echo $form['ubicacion_id'];?>
                    </div>
                          
                      <div class="form-group col-md-4 <?php if($form['tamano']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['tamano']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Tamaño</label>
                      <?php  echo $form['tamano'];?>
                    </div> 
                      
                    <div class="form-group col-md-4 <?php if($form['peso_max_vacio']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['peso_max_vacio']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Peso max vacío</label>
                      <?php  echo $form['peso_max_vacio'];?>
                    </div>
                          
                     <div class="form-group col-md-4 <?php if($form['peso_max_pasajeros']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['peso_max_pasajeros']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Peso max con pasajeros</label>
                      <?php  echo $form['peso_max_pasajeros'];?>
                    </div>     
                          
                          
                      <div class="form-group col-md-4 <?php if($form['capacidad']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['capacidad']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Cantidad pasajeros</label>
                      <?php  echo $form['capacidad'];?>
                    </div>
                      
                      <div class="form-group col-md-4 <?php if($form['peso_limite']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['peso_limite']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Peso limite</label>
                      <?php  echo $form['peso_limite'];?>
                    </div>
                          
                          
                    <div class="form-group col-md-8 <?php if($form['certificado']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['certificado']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Vigencia certificado aeronavegabilidad</label>
                      <?php  echo $form['certificado'];?>
                    </div>
                      
                     
                      
                    
                      
                      
                      <div style="clear: both"></div>  
                  
                      
                  </div><!-- /.box-body -->
                      
                      
                      
              </div><!-- /.tab-content -->
              
                     
              <div class="tab-pane" id="tab_2">
                    
              <div class="box-body">
                  
                  
                   <div class="form-group col-md-12  <?php if($form['canastilla_id']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['canastilla_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Canastilla</label>
                      <?php  echo $form['canastilla_id'];?>
                    </div>
                      
                      <div class="form-group col-md-12 <?php if($form['quemador_id']->renderError()) echo "has-error"; ?>">
                      <label for="rif"><?php if($form['quemador_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Quemador</label>
                      <?php  echo $form['quemador_id'];?>
                      </div>
                      <div style="clear: both"></div> 
                  
                  
                  
                  </div>
                  </div><!-- /.tab-content -->
                  
                  <div class="tab-pane" id="tab_3">
                    
                        <div class="box-body">
                            
                        </div>
                    </div><!-- /.tab-content -->
                    
                    <div class="tab-pane" id="tab_4">
                    
                        <div class="box-body">
                            
                            
                              <div class="form-group col-md-12 <?php if($form['imagen']->renderError()) echo "has-error"; ?>">
                      <label for="rif"><?php if($form['imagen']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Imagen</label>
                      <?php  echo $form['imagen'];?>
                      </div>
                      
                            
                            <div class="form-group col-md-12  <?php if($form['descripcion']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['descripcion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Descripción</label>
                      <?php  echo $form['descripcion'];?>
                    </div>
                            
                      <div style="clear: both"></div>  
                            
                            
                        </div>
                    </div><!-- /.tab-content -->
                    
                    <div class="tab-pane" id="tab_5">
                    
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
                    <?php foreach ($form->getObject()->getMantenimientoGlobo() as $mantenimiento){ ?>
                    <tr  id="mantenimientos<?php echo $i ?>">
                      <td><?php echo $mantenimiento->getFecha(); ?></td>
                      <td><?php echo $mantenimiento->getObservacion(); ?></td>
                      <td><?php echo $mantenimiento->getRealizadoPor(); ?></td>
                    </tr>
                    <?php }}?>
                  </tbody></table>
                </div><!-- /.box-body -->
                            
                            <div style="clear: both"></div> 
                        </div>
                    </div><!-- /.tab-content -->
                    
                    
                    <div class="tab-pane" id="tab_6">
                    
                        <div class="box-body">
                            
                            <div class="form-group col-md-12 <?php if($form['observacion']->renderError()) echo "has-error"; ?>">
                      <label for="rif"><?php if($form['observacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
                      <?php  echo $form['observacion'];?>
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
            
            
          
      
