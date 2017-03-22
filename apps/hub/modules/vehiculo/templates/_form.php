<script type="text/javascript" src="/sfDependentSelectPlugin/js/SelectDependiente.min.js"></script>
<script type="text/javascript" src="/sfFormExtraPlugin/js/double_list.js"></script>
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
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/hub_dev.php/vehiculo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                    
                    
                    
                    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos básicos</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Precios</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Politicas</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Seguro</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Adicionales</a></li>

                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">  
                  <div class="box-body">
                  
                    
                      
                      
                    <div class="form-group col-md-3 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Nombre vehículo</label>
                      <?php  echo $form['nombre'];?>
                    </div>  
                   
                      <div class="form-group col-md-3 <?php if($form['placa']->renderError()) echo "has-error"; ?>">
                      <label for="placa"><?php if($form['placa']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Placa</label>
                      <?php  echo $form['placa'];?>
                    </div> 
                 
                      
                    <div class="form-group col-md-3 <?php if($form['anno']->renderError()) echo "has-error"; ?>">
                      <label for="anno"><?php if($form['anno']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Año</label>
                      <?php  echo $form['anno'];?>
                    </div>
                      
                   <div class="form-group col-md-3 <?php if($form['vehiculo_tipo_reproductor_id']->renderError()) echo "has-error"; ?>">
                      <label for="vehiculo_tipo_reproductor_id"><?php if($form['vehiculo_tipo_reproductor_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Tipo de reproductor:</label>
                      <?php  echo $form['vehiculo_tipo_reproductor_id'];?>
                   </div> 
                      
                      <div class="form-group col-md-3 <?php if ($form['vehiculo_marca_id']->renderError()) echo "has-error"; ?>">
                          <label for="vehiculo_marca_id"><?php if ($form['vehiculo_marca_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Marca:</label>
                          <?php echo $form['vehiculo_marca_id']; ?>
                      </div>

                      <div class="form-group col-md-3 <?php if ($form['vehiculo_marca_modelo_id']->renderError()) echo "has-error"; ?>">
                          <label for="vehiculo_marca_modelo_id"><?php if ($form['vehiculo_marca_modelo_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Marca/Modelo</label>
                          <?php echo $form['vehiculo_marca_modelo_id']; ?>
                      </div>
                      
                    <div class="form-group col-md-3 <?php if($form['vehiculo_categoria_id']->renderError()) echo "has-error"; ?>">
                      <label for="vehiculo_categoria_id"><?php if($form['vehiculo_categoria_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Tipo de categoría:</label>
                      <?php  echo $form['vehiculo_categoria_id'];?>
                    </div>   
                      
                      <div class="form-group col-md-3 <?php if ($form['vehiculo_tipo_transmision_id']->renderError()) echo "has-error"; ?>">
                          <label for="vehiculo_tipo_transmision_id"><?php if ($form['vehiculo_tipo_transmision_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Tipo de transmisión:</label>
                          <?php echo $form['vehiculo_tipo_transmision_id']; ?>
                      </div>  

                      <div class="form-group col-md-3 <?php if ($form['vehiculo_tipo_id']->renderError()) echo "has-error"; ?>">
                          <label for="vehiculo_tipo_id"><?php if ($form['vehiculo_tipo_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Tipo de vehículo:</label>
                          <?php echo $form['vehiculo_tipo_id']; ?>
                      </div>  
                      
                      
                      
                      <div style="clear: both"></div>

                    
                  </div><!-- /.box-body -->
                  </div>
                 <div class="tab-pane" id="tab_2">  
                     <div class="box-body">
                         
                         
                        <!--Formulario embebido de precios--> 
                        
                        
                      
                <div class="box-header">
                  <h3 class="box-title">Precios de los tramos de los vehiculos</h3>
                  <a  style="margin-left: 10px;" href="javascript:null(0)" id='add_precios'>Agregar Nueva</a>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody id='extraprecios'>
                     <tr >
                      <th>Provincia</th>
                      <th>Ciudad</th>
                      <th>Provincia Destino</th>
                      <th>Ciudad Destino</th>
                      <th>Precio</th>
                      <th></th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['precios']);$i++){ ?>
                    <tr  id="precios<?php echo $i ?>">
                      <td><?php echo $form['precios'][$i]['provincia_id'] ?></td>
                      <td><?php echo $form['precios'][$i]['ciudad_id'] ?></td>
                      <td><?php echo $form['precios'][$i]['provincia_final_id'] ?></td>
                      <td><?php echo $form['precios'][$i]['ciudad_final_id'] ?></td>
                      <td><?php echo $form['precios'][$i]['precio'] ?></td>
                    <td>
                         
                         <button class="btn btn-social-icon btn-google-plus" onclick="removeEtiqueta('precios<?php echo $i ?>','<?php echo url_for('vehiculo/delPrecio')."?id=".$form['precios'][$i]['id']->getValue() ?>')" type="button"><i class="fa fa-bitbucket"></i></button>
                             <?php
                             //Imprimir todos los valores ocultos del formulario
                             echo $form['precios'][$i]->renderHiddenFields(true);
                             ?>
                     </td>
                    </tr>
                    <?php } ?>
                  </tbody></table>
                </div><!-- /.box-body -->
                
                
                        <!--fin Formulario embebido de precios--> 
                         
                         
                         
                         
                         <div style="clear: both"></div>
                     </div>
                     
                 </div>
                    
                    
                    
                  <!--Politicas-->
                  <div class="tab-pane" id="tab_3">  
                      <div class="box-body">
                        
                          <div class="form-group col-md-12"> 

                              <table class="table table-striped">
                                  <tbody id='extrapoliticas'>
                                      <tr >
                                          <th>Politica</th>
                                          <th>Valor</th>
                                      </tr>

                                      <?php for ($i = 0; $i < count($form['politicas']); $i++) { ?>
                                          <tr id="precios<?php echo $i ?>">
                                              <td><?php echo sfContext::getInstance()->getUser()->getAttribute('vehiculos_politicas'.$form['politicas'][$i]['vehiculo_politica_id']->getValue()); ?>
                                                  <?php 
                                                  //Imprimir todos los valores ocultos del formulario
                                                  echo $form['politicas'][$i]->renderHiddenFields(true); ?>
                                              </td>
                                              <td><?php echo $form['politicas'][$i]['valor'] ?></td>

                                          </tr>
                                      <?php } ?>
                                  </tbody></table>
                          </div>  
                          
                          
                      <div style="clear: both"></div>


                  </div><!-- /.box-body -->
                  </div>
                  
                  <div class="tab-pane" id="tab_4">  
                      <div class="box-body">
                          <div class="form-group col-md-12"> 

                              <table class="table table-striped">
                                  <tbody id='extraseguros'>
                                      <tr >
                                          <th>Seguro</th>
                                          <th>Valor</th>
                                      </tr>

                                      <?php for ($i = 0; $i < count($form['seguros']); $i++) { ?>
                                          <tr id="precios<?php echo $i ?>">
                                              <td><?php echo sfContext::getInstance()->getUser()->getAttribute('vehiculos_seguros' . $form['seguros'][$i]['vehiculo_seguro_id']->getValue()); ?>
                                                  <?php
                                                  //Imprimir todos los valores ocultos del formulario
                                                  echo $form['seguros'][$i]->renderHiddenFields(true);
                                                  ?>
                                              </td>
                                              <td><?php echo $form['seguros'][$i]['valor'] ?></td>

                                          </tr>
<?php } ?>
                                  </tbody></table>
                          </div>
                      <div style="clear: both"></div>


                  </div><!-- /.box-body -->
                  </div>
                  <div class="tab-pane" id="tab_5">  
                      <div class="box-body">
                          <div class="form-group col-md-12"> 

                              <table class="table table-striped">
                                  <tbody id='extraadicionales'>
                                      <tr >
                                          <th>Adicional</th>
                                          <th>Valor</th>
                                      </tr>

                                      <?php for ($i = 0; $i < count($form['adicionales']); $i++) { ?>
                                          <tr id="precios<?php echo $i ?>">
                                              <td><?php echo sfContext::getInstance()->getUser()->getAttribute('vehiculos_adicionales' . $form['adicionales'][$i]['vehiculo_adicional_id']->getValue()); ?>
                                                  <?php
                                                  //Imprimir todos los valores ocultos del formulario
                                                  echo $form['adicionales'][$i]->renderHiddenFields(true);
                                                  ?>
                                              </td>
                                              <td><?php echo $form['adicionales'][$i]['valor'] ?></td>

                                          </tr>
<?php } ?>
                                  </tbody></table>
                          </div>
                      <div style="clear: both"></div>


                  </div><!-- /.box-body -->
                  </div>
                  

         
            
                    
                  
                  <div class="box-footer">
                   <?php echo $form->renderHiddenFields(false) ?>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </div>
                
              </div><!-- /.box -->
                </form>
             
            </div>  
           </div><!-- /.row -->
        </section><!-- /.content -->

<script type="text/javascript">
            
    $('#vehiculo_vehiculo_marca_modelo_id').addClass('form-control');
    $('#vehiculo_precios_0_ciudad_id').addClass('form-control');
    $('#vehiculo_precios_0_ciudad_final_id').addClass('form-control');
    
    
    
//contador de elementos existentes en el formulario    
var prec = <?php print_r($form['precios']->count())?>;


 $('#add_precios').click(function() {
    
    $("#extraprecios").append(addPrecio(prec));
    prec = prec + 1;
    
    
  });


function addPrecio(num) {
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('/vehiculo/addPrecioForm')?>'+'<?php echo   ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
    async: false
  }).responseText;
  return r;
}



  function removeEtiqueta(num,url) {
 
    
            //Remueve el atributo ingresado en el formulario
            $("#"+num).remove();    
                var r = $.ajax({
                        type: 'POST',
                        url: url,
                        async: false
                        });    
                
    
    }
    
    
    
</script>
        