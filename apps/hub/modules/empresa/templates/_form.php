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
                
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/empresa/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                    
                    
                
                 <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos básicos</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Configuraciones</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Quienes somos</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Faq</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Politica</a></li>
                  <li><a href="#tab_6" data-toggle="tab">Privacidad</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
                  <div class="box-body">
                    
                    
                   <div class="form-group <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nombre empresa</label>
                      <?php  echo $form['nombre'];?>
                   </div>
                      
                      
                      <div class="form-group col-md-3 <?php if($form['nickname']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['nickname']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Nickname</label>
                      <?php  echo $form['nickname'];?>
                    </div>
                      
                     <div class="form-group col-md-3 <?php if($form['rif']->renderError()) echo "has-error"; ?>">
                      <label for="rif"><?php if($form['rif']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>RUC</label>
                      <?php  echo $form['rif'];?>
                      </div>
                      
                     <div class="form-group col-md-3 <?php if($form['dni']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['dni']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>DNI</label>
                      <?php  echo $form['dni'];?>
                    </div>
                      
                      <div class="form-group col-md-3 <?php if($form['status']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['status']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Status</label>
                      <?php  echo $form['status'];?>
                    </div>
                      
                      
                   
                      <div class="form-group col-md-6 <?php if($form['telefono1']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['telefono1']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Teléfono</label>
                      <?php  echo $form['telefono1'];?>
                    </div>
                      
                     <div class="form-group col-md-6 <?php if($form['telefono2']->renderError()) echo "has-error"; ?>">
                      <label for="telefono2"><?php if($form['telefono2']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Teléfono adicional</label>
                      <?php  echo $form['telefono2'];?>
                    </div>
                      
                    <div class="form-group  <?php if($form['email']->renderError()) echo "has-error"; ?>">
                      <label for="email"><?php if($form['email']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Correo</label>
                      <?php  echo $form['email'];?>
                    </div>
                      
                
                      
                    <div class="form-group col-md-6 <?php if($form['contacto_nombre']->renderError()) echo "has-error"; ?>">
                      <label for="contacto_nombre"><?php if($form['contacto_nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Contacto nombre</label>
                      <?php  echo $form['contacto_nombre'];?>
                    </div>
                      
                    <div class="form-group col-md-6 <?php if($form['contacto_puesto']->renderError()) echo "has-error"; ?>">
                      <label for="contacto_puesto"><?php if($form['contacto_puesto']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Contacto puesto</label>
                      <?php  echo $form['contacto_puesto'];?>
                    </div>
                
                          <div class="form-group <?php if($form['direccion_fiscal']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fiscal"><?php if($form['direccion_fiscal']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Dirección fiscal</label>
                      <?php  echo $form['direccion_fiscal'];?>
                   </div>
                      
                   
                      
                   <div class="form-group <?php if($form['observacion']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['observacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
                      <?php  echo $form['observacion'];?>
                   </div>
                      
                
                      
                    
                  </div><!-- /.box-body -->

                  
                
              
                      
                      
                      
                      
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="box-body">
                              
                    <div class="form-group col-md-4 <?php if($form['sitio_web']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['sitio_web']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Sitio web</label>
                      <?php  echo $form['sitio_web'];?>
                    </div>
                      
                     <div class="form-group col-md-4 <?php if($form['idioma_id']->renderError()) echo "has-error"; ?>">
                      <label for="telefono2"><?php if($form['idioma_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Idioma</label>
                      <?php  echo $form['idioma_id'];?>
                    </div>   
                 
                        
                          <div class="form-group col-md-12 <?php if($form['titulo']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['titulo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Detalle titulo (sr/sra.)</label>
                      <?php  echo $form['titulo'];?>
                   </div>
                
                    <div class="form-group col-md-12 <?php if($form['nacionalidad']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['nacionalidad']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nacionalidades</label>
                      <?php  echo $form['nacionalidad'];?>
                   </div>
                
                    <div class="form-group col-md-12 <?php if($form['edo_civil']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['edo_civil']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Estados civilies</label>
                      <?php  echo $form['edo_civil'];?>
                   </div>
                
                   <div class="form-group col-md-12 <?php if($form['ocupacion']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['ocupacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Ocupaciones</label>
                      <?php  echo $form['ocupacion'];?>
                   </div>
                
                   <div class="form-group col-md-12 <?php if($form['grado_instruccion']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['grado_instruccion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Grado de instruccion</label>
                      <?php  echo $form['grado_instruccion'];?>
                   </div>
                        
                        <div style="clear: both"></div>
                        
                    </div>    
                  </div><!-- /.tab-pane -->
                  
                  
                  <div class="tab-pane" id="tab_3">
                    <div class="box-body">
                              
                    <div class="form-group col-md-12 <?php if($form['quienes_titulo']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['quienes_titulo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Titulo</label>
                      <?php  echo $form['quienes_titulo'];?>
                    </div>
                        
                        <div class="form-group col-md-12 <?php if($form['quienes_contenido']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['quienes_contenido']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Contenido</label>
                      <?php  echo $form['quienes_contenido'];?>
                    </div>
                        
                    <div class="form-group col-md-12 <?php if($form['quienes_imagen']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['quienes_imagen']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Imagen (570 x 310px)</label>
                      <?php  echo $form['quienes_imagen'];?>
                    </div>
                      
                     
                        
                        <div style="clear: both"></div>
                        
                    </div>    
                  </div><!-- /.tab-pane -->
                  
                  
                  <div class="tab-pane" id="tab_4">
                    <div class="box-body">
                              
                    <div class="form-group col-md-12 <?php if($form['faq_titulo']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['faq_titulo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Titulo</label>
                      <?php  echo $form['faq_titulo'];?>
                    </div>
                        
                        <div class="form-group col-md-12 <?php if($form['faq_contenido']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['faq_contenido']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Contenido</label>
                      <?php  echo $form['faq_contenido'];?>
                    </div>
                        
                        <div style="clear: both"></div>
                        
                    </div>    
                  </div><!-- /.tab-pane -->
                  
                  
                  <div class="tab-pane" id="tab_5">
                    <div class="box-body">
                              
                    <div class="form-group col-md-12 <?php if($form['politicas']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['politicas']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Politicas de la empresa</label>
                      <?php  echo $form['politicas'];?>
                    </div>
                        
                        
                        <div style="clear: both"></div>
                        
                    </div>    
                  </div><!-- /.tab-pane -->
                  
                  
                  <div class="tab-pane" id="tab_6">
                    <div class="box-body">
                              
                    <div class="form-group col-md-12 <?php if($form['privacidad']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['privacidad']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Privacidad de la empresa</label>
                      <?php  echo $form['privacidad'];?>
                    </div>
                        
                        
                        <div style="clear: both"></div>
                        
                    </div>    
                  </div><!-- /.tab-pane -->
             
                
                
               
              </div>
                
                <div class="box-footer">
                   <?php echo $form->renderHiddenFields(false) ?>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </div>
              <!-- general form elements -->
              

             </form>
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
        <script type="text/javascript">
        
        function saveOption(obj,empresa_id){
            
            var valor = $(obj).html();
            var sql   = $(obj).attr('id');
            var sql_valor;
            
            
            
            if(valor == 'OFF'){
                
                    $(obj).html('ON');
                    $(obj).attr('class','btn btn-success');
                    sql_valor = 1;
                
            }else{
                
                    $(obj).html('OFF');
                    $(obj).attr('class','btn btn-danger');
                    sql_valor = 0;
            }
            
              $.ajax({
                        url: '<?php echo url_for('empresa/updateAttr')?>',
                        data: 'empresa_id='+empresa_id+'&sql='+sql+'&sql_valor='+sql_valor,
                        type: "POST",
                        success: function(theResponse){
                            
                      if(valor == 'OFF'){

                                $(obj).html('ON');
                                $(obj).attr('class','btn btn-success');
                                
                        }else{

                                $(obj).html('OFF');
                                $(obj).attr('class','btn btn-danger');
                        }      

                            
                 }});
            
            
        }
        
        
        </script>
      
