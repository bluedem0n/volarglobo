<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

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
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/cliente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                
                 <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos clientes</a></li>
                  
                  <li><a href="#tab_3" data-toggle="tab">Observación</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
                      <div class="box-body">
                    
                  <div class="form-group col-md-3 <?php if($form['tipo_cliente_id']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['tipo_cliente_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Tipo cliente</label>
                      <?php  echo $form['tipo_cliente_id'];?>
                   </div> 
                          
                          
                   <div class="form-group col-md-3 <?php if($form['titulo']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['titulo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Titulo</label>
                      <?php  echo $form['titulo'];?>
                   </div>
                      
                   <div class="form-group col-md-3 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nombre</label>
                      <?php  echo $form['nombre'];?>
                   </div>
                      
                   <div class="form-group col-md-3 <?php if($form['apellido']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['apellido']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Apellido</label>
                      <?php  echo $form['apellido'];?>
                   </div>
                      
                   <div class="form-group col-md-3 <?php if($form['sexo']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['sexo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Sexo</label>
                      <?php  echo $form['sexo'];?>
                   </div>
                      
                   <div class="form-group col-md-3 <?php if($form['dni']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['dni']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> DNI</label>
                      <?php  echo $form['dni'];?>
                   </div>
                      
                  
                      
                   <div class="form-group col-md-3 <?php if($form['edo_civil']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['edo_civil']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Estado civil</label>
                      <?php  echo $form['edo_civil'];?>
                   </div>
               
                   
                    <div class="form-group col-md-3 <?php if($form['ocupacion']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['ocupacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Ocupación</label>
<!--                      <div style="clear: both"></div>-->
                      <?php  echo $form['ocupacion'];?>
                   </div>
                      
                   
                      
                   <div class="form-group col-md-3 <?php if($form['fecha_nacimiento']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['fecha_nacimiento']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Fecha nacimiento</label>
<!--                      <div style="clear: both"></div>-->
                      <?php  echo $form['fecha_nacimiento'];?>
                   </div>
                      
                  
                      
                   <div class="form-group col-md-3 <?php if($form['nacionalidad']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['nacionalidad']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nacionalidad</label>
                      <?php  echo $form['nacionalidad'];?>
                   </div>
                      
                   
                   <div class="form-group col-md-3 <?php if($form['telefono_principal']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['telefono_principal']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Telf. Local</label>
                      <?php  echo $form['telefono_principal'];?>
                   </div>
                 
                   <div class="form-group col-md-3 <?php if($form['email']->renderError()) echo "has-error"; ?>">
                      <label for="nombre_cliente"><?php if($form['email']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Correo</label>
                      <?php  echo $form['email'];?>
                   </div>
                   
                
                   <div class="form-group col-md-12 <?php if($form['direcion']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fiscal"><?php if($form['direcion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Dirección </label>
                      <?php  echo $form['direcion'];?>
                   </div>
                      
                          
                          
                      
                   <div style="clear: both"></div>         
                      
                  
                      
                  </div><!-- /.box-body -->
                      
                      
                      
              </div><!-- /.tab-content -->
              
                     
              
                  
                  <div class="tab-pane" id="tab_3">
                    
                        <div class="box-body">
                            
                  
                            
                  <div class="form-group col-md-12 <?php if($form['observacion']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fiscal"><?php if($form['observacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
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
      
<script type="text/javascript">
//                $("#fechaNacimiento").datepicker({
//                        dateFormat: "yy-mm-dd",
//                        changeMonth: true,
//                        changeYear: true
//                  });
//                  
                  //$('#fechaNacimiento').mask("99/99/9999", {placeholder: 'MM/DD/YYYY' });
             
</script>
