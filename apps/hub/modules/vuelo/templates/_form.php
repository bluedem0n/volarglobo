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
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/vuelo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos básicos</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Clientes</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Servicios</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Restricciones</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Recomendacioes</a></li>
                  <li><a href="#tab_6" data-toggle="tab">Observaciones</a></li>
                  <li><a href="#tab_7" data-toggle="tab">Condiciones</a></li>
                  <li><a href="#tab_8" data-toggle="tab">Hospedaje</a></li>
                  
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">  
                  <div class="box-body">
                    
                    <div class="form-group col-md-4 <?php if($form['codigo']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['codigo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Codigo</label>
                      <?php  echo $form['codigo'];?>
                    </div>
                      
                    <div class="form-group col-md-4 <?php if($form['globo_id']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['globo_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Globo</label>
                      <?php  echo $form['globo_id'];?>
                    </div>
                      
                      <div class="form-group col-md-4 <?php if($form['horario']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['horario']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Horario </label>
                      <?php  echo $form['horario'];?>
                    </div>
                      
                      
                    <div class="form-group col-md-4 <?php if($form['fecha_activacion']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['fecha_activacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Fecha </label>
                      <?php  echo $form['fecha_activacion'];?>
                    </div>
                      
                      <div class="form-group col-md-4 <?php if($form['tipo_tarifa_id']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['tipo_tarifa_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Tarifa </label>
                      <?php  echo $form['tipo_tarifa_id'];?>
                    </div>
                      
                      
                      <div class="form-group col-md-4 <?php if($form['tipo_lona_id']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['tipo_lona_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Lona </label>
                      <?php  echo $form['tipo_lona_id'];?>
                    </div>
                      
                    <div class="form-group col-md-4 <?php if($form['tipo_vuelo_id']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['tipo_vuelo_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Tipo de vuelo </label>
                      <?php  echo $form['tipo_vuelo_id'];?>
                    </div>
                      
                      <div class="form-group col-md-4 <?php if($form['tipo_motivo_id']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['tipo_motivo_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Motivo </label>
                      <?php  echo $form['tipo_motivo_id'];?>
                    </div>
                      
                      
                      
                      
                      <div style="clear: both"></div>
                   
                      
                   
                      
                    
                  </div><!-- /.box-body -->

                  </div>
                  
                <div class="tab-pane" id="tab_2">  
                  
                      <div class="box-body">
                      
                          
                          <div class="box-header">
                  <h3 class="box-title">Asociar pasajeros</h3>
                  <a  style="margin-left: 10px;" href="javascript:null(0)" id='add_clientes'>Agregar Nuevo</a>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody id='extraclientes'>
                     <tr >
                      <th>Nombre del cliente</th>
                      
                      <th></th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['clientes']);$i++){ ?>
                    <tr  id="clientes<?php echo $i ?>">
                      <td><?php echo $form['clientes'][$i]['cliente_id'] ?></td>                      
                    <td>
                         <button class="btn btn-social-icon btn-google-plus" onclick="removeEtiqueta('clientes<?php echo $i ?>','<?php echo url_for('proveedor/delSucursal')."?id=".$form['clientes'][$i]['id']->getValue() ?>')" type="button"><i class="fa fa-bitbucket"></i></button>
                     </td>
                    </tr>
                    <?php } ?>
                  </tbody></table>
                </div><!-- /.box-body -->
                          
                          
                          
                          
                          <div style="clear: both"></div>
                
                </div></div>
                    
                 
                <div class="tab-pane" id="tab_3">  
                  
                      <div class="box-body">
                      
                      <div class="form-group col-md-12"> 
                
                  <table class="table table-striped">
                    <tbody id='extrarestriciones'>
                     <tr>
                      <th>Proveedor</th>
                      <th>Categoría</th>
                      <th>Servicio</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Activar</th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['proveedor_descuento']);$i++){ ?>
                    
                    <tr id="restriciones<?php echo $i ?>">
                      
                      <td><?php echo sfContext::getInstance()->getUser()->getAttribute('proveedor_descuento_nombre'.$form['proveedor_descuento'][$i]['proveedor_descuento_id']->getValue()); ?></td>
                      <td><?php echo sfContext::getInstance()->getUser()->getAttribute('proveedor_descuento_categoria'.$form['proveedor_descuento'][$i]['proveedor_descuento_id']->getValue()); ?></td>
                      <td><?php echo sfContext::getInstance()->getUser()->getAttribute('proveedor_descuento'.$form['proveedor_descuento'][$i]['proveedor_descuento_id']->getValue()); ?></td>
                      <td><?php echo sfContext::getInstance()->getUser()->getAttribute('proveedor_descuento_precio'.$form['proveedor_descuento'][$i]['proveedor_descuento_id']->getValue()); ?></td>
                      <td><?php echo $form['proveedor_descuento'][$i]['cantidad'] ?></td>
                      <td><?php echo $form['proveedor_descuento'][$i]['proveedor_descuento_id'] ?>
                          <?php echo $form['proveedor_descuento'][$i]['valor'] ?></td>
                      
                    
                    </tr>
                    
                    <?php } ?>
                  </tbody></table>
                </div>
                       
                          
                          
                          <div style="clear: both"></div>
                
                </div></div>
                    
                    
                    
               <div class="tab-pane" id="tab_4">  
                  
                      <div class="box-body">
                      
                      
                      
                      <div class="form-group col-md-12"> 
                
                  <table class="table table-striped">
                    <tbody id='extrarestriciones'>
                     <tr>
                      <th>Restrición</th>
                      <th>Activar</th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['restriciones']);$i++){ ?>
                    
                    <tr id="restriciones<?php echo $i ?>">
                      
                      <td>
                          <?php echo sfContext::getInstance()->getUser()->getAttribute('restriciones'.$form['restriciones'][$i]['tipo_restriciones_id']->getValue()); ?></td>
                      <td>
                          <?php echo $form['restriciones'][$i]['tipo_restriciones_id'] ?>
                          <?php echo $form['restriciones'][$i]['valor'] ?></td>
                    
                    </tr>
                    
                    <?php } ?>
                  </tbody></table>
                </div>
                      
                      
                  <div style="clear: both"></div>
                
                </div></div>
                    
                    
               <div class="tab-pane" id="tab_5">  
                  
                      <div class="box-body">
                      
                          <div class="form-group col-md-12"> 
                
                  <table class="table table-striped">
                    <tbody id='extrarestriciones'>
                     <tr>
                      <th>Recomendaciones</th>
                      <th>Activar</th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['recomendaciones']);$i++){ ?>
                    
                    <tr id="restriciones<?php echo $i ?>">
                      
                      <td>
                          <?php echo sfContext::getInstance()->getUser()->getAttribute('recomendaciones'.$form['recomendaciones'][$i]['tipo_recomendaciones_id']->getValue()); ?></td>
                      <td>
                          <?php echo $form['recomendaciones'][$i]['tipo_recomendaciones_id'] ?>
                          <?php echo $form['recomendaciones'][$i]['valor'] ?></td>
                    
                    </tr>
                    
                    <?php } ?>
                  </tbody></table>
                </div>
                          
                          
                          <div style="clear: both"></div>
                
                </div></div>     
                    
                    
                  <div class="tab-pane" id="tab_6">  
                  
                      
                      
                  <div class="box-body">
                      
                      <div class="form-group <?php if($form['observacion']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['observacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
                      <?php  echo $form['observacion'];?>
                   </div>
                      
                      <div style="clear: both"></div>
                
                </div></div>
                    
                <div class="tab-pane " id="tab_7">  
                  <div class="box-body">
                      
                      
                      <div class="form-group <?php if($form['condiciones']->renderError()) echo "has-error"; ?>">
                      <label for="condiciones"><?php if($form['condiciones']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Condicones</label>
                      <?php  echo $form['condiciones'];?>
                   </div>
                      
                      <div style="clear: both"></div>
                      
                
                </div></div>
                    
                     <div class="tab-pane " id="tab_8">  
                  <div class="box-body">
                      
                      
                      
                      <div class="box-header">
                  <h3 class="box-title">Asociar hospedaje</h3>
                  <a  style="margin-left: 10px;" href="javascript:null(0)" id='add_hospedajes'>Agregar Nuevo</a>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody id='extrahospedajes'>
                     <tr >
                      <th>Hotel</th>
                      <th>Habitación</th>
                      <th>CheckIn</th>
                      <th>CheckOut</th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['hospedajes']);$i++){ ?>
                    <tr  id="hospedajes<?php echo $i ?>">
                        <td><?php echo $form['hospedajes'][$i]['hospedaje_id'] ?></td>
                        <td><?php echo $form['hospedajes'][$i]['hospedaje_habitacion_id'] ?></td>
                        <td><?php echo $form['hospedajes'][$i]['check_in'] ?></td>
                        <td><?php echo $form['hospedajes'][$i]['check_out'] ?></td>
                    <td>
                        
                        <script type="text/javascript">
                            $('#proveedor_vuelo_hospedajes_<?php echo $i ?>_hospedaje_habitacion_id').addClass('form-control');
            </script>
                         <button class="btn btn-social-icon btn-google-plus" onclick="removeEtiqueta('hospedajes<?php echo $i ?>','<?php echo url_for('proveedor/delSucursal')."?id=".$form['hospedajes'][$i]['id']->getValue() ?>')" type="button"><i class="fa fa-bitbucket"></i></button>
                     </td>
                    </tr>
                    <?php } ?>
                  </tbody></table>
                </div><!-- /.box-body -->
                          
                      
                      
                      
                      
                      <div style="clear: both"></div>
                      
                
                </div></div>
                    
               
                
                    
                    
                    
                 
                  <div class="box-footer">
                   <?php echo $form->renderHiddenFields(false) ?>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </div>
                </form>
              </div><!-- /.box -->

             
            
            <!-- /.row -->
        </section><!-- /.content -->
      
<script type="text/javascript">
            
  
        
    
var prec = <?php print_r($form['clientes']->count())?>;


 $('#add_clientes').click(function() {
    
    $("#extraclientes").append(addSucursal(prec));
    prec = prec + 1;
  });


function addSucursal(num) {
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('/vuelo/addClienteForm')?>'+'<?php echo   ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
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