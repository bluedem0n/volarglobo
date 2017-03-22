
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
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/proveedor/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                    
                    
                    
                    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos básicos</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Ubicación</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Sucursales</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Multimedia</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Posicionamiento</a></li>
                  <li><a href="#tab_7" data-toggle="tab">Pagos</a></li>
<!--                  <li><a href="#tab_8" data-toggle="tab">Catalogo</a></li>-->
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">  
                  <div class="box-body">
                    
                      
                    
                      
                      
                    <div class="form-group col-md-4 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Nombre proveedor</label>
                      <?php  echo $form['nombre'];?>
                    </div>  
                   
                      <div class="form-group col-md-4 <?php if($form['destacado']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['destacado']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Destacado</label>
                      <?php  echo $form['destacado'];?>
                    </div> 
                   
                   <div class="form-group col-md-4 <?php if($form['categoria_id']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['categoria_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Categoría</label>
                      <?php  echo $form['categoria_id'];?>
                    </div> 
                      
                      
                    <div class="form-group col-md-4 <?php if($form['nickname']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['nickname']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Nickname</label>
                      <?php  echo $form['nickname'];?>
                    </div>
                      
                     <div class="form-group col-md-4 <?php if($form['rif']->renderError()) echo "has-error"; ?>">
                      <label for="rif"><?php if($form['rif']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>RUC</label>
                      <?php  echo $form['rif'];?>
                      </div>
                      
                     
                      
                      <div class="form-group col-md-4 <?php if($form['status']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['status']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Status</label>
                      <?php  echo $form['status'];?>
                    </div>
                      
                     <div class="form-group col-md-4 <?php if($form['website']->renderError()) echo "has-error"; ?>">
                      <label for="website"><?php if($form['website']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Website</label>
                      <?php  echo $form['website'];?>
                    </div> 
                   
                      <div class="form-group col-md-4 <?php if($form['telefono1']->renderError()) echo "has-error"; ?>">
                      <label for="telefono1"><?php if($form['telefono1']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Teléfono</label>
                      <?php  echo $form['telefono1'];?>
                    </div>
                      
                     <div class="form-group col-md-4 <?php if($form['telefono2']->renderError()) echo "has-error"; ?>">
                      <label for="telefono2"><?php if($form['telefono2']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Teléfono adicional</label>
                      <?php  echo $form['telefono2'];?>
                    </div>
                      
                    <div class="form-group  col-md-4  <?php if($form['email']->renderError()) echo "has-error"; ?>">
                      <label for="email"><?php if($form['email']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Correo</label>
                      <?php  echo $form['email'];?>
                    </div>
                      
                    
                
                      
                    <div class="form-group col-md-4 <?php if($form['contacto_nombre']->renderError()) echo "has-error"; ?>">
                      <label for="contacto_nombre"><?php if($form['contacto_nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Contacto nombre</label>
                      <?php  echo $form['contacto_nombre'];?>
                    </div>
                      
                    <div class="form-group col-md-4 <?php if($form['contacto_puesto']->renderError()) echo "has-error"; ?>">
                      <label for="contacto_puesto"><?php if($form['contacto_puesto']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Contacto puesto</label>
                      <?php  echo $form['contacto_puesto'];?>
                    </div>
                
                   <div class="form-group <?php if($form['descripcion']->renderError()) echo "has-error"; ?>">
                      <label for="descripcion"><?php if($form['descripcion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Descripción</label>
                      <?php  echo $form['descripcion'];?>
                   </div>   
                      
                      
                   
                      
                   <div class="form-group <?php if($form['observacion']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['observacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
                      <?php  echo $form['observacion'];?>
                   </div>
                      
                    
                  </div><!-- /.box-body -->

                  </div>
                  <div class="tab-pane" id="tab_2">  
                  
                      
                      
                  <div class="box-body">
                
                     
                      
                      <div class="form-group col-md-3 <?php if($form['provincia_id']->renderError()) echo "has-error"; ?>">
                      <label for="rif"><?php if($form['provincia_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Provincia</label>
                          <?php  echo $form['provincia_id'];?>
                          
                      </div>
                      
                     <div class="form-group col-md-3 <?php if($form['ciudad_id']->renderError()) echo "has-error"; ?>">
                      <label for="rif"><?php if($form['ciudad_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Provincia/Estado</label>
                          
                          <?php  echo $form['ciudad_id'];?>
                      
                      
                      </div>
                      
                    
                      
                   <div class="form-group col-md-12 <?php if($form['horario']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['horario']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Horario</label>
                      <?php  echo $form['horario'];?>
                   </div>
                      
                   <div class="form-group col-md-12 <?php if($form['direccion_fiscal']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fiscal"><?php if($form['direccion_fiscal']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Dirección fiscal</label>
                      <?php  echo $form['direccion_fiscal'];?>
                   </div>
                      
                   <div class="form-group  col-md-12 <?php if($form['direccion_fisica']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['direccion_fisica']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Lontigud / Latitud GoogleMaps</label>
                      <?php  echo $form['direccion_fisica'];?>
                   </div>
                      
                      <div style="clear: both"></div> 
                      
                      
                
                </div></div>
                    
                <div class="tab-pane " id="tab_3">  
                  <div class="box-body">
                      
                      
                      
                      
                      
                      
                <div class="box-header">
                  <h3 class="box-title">Sucursales del proveedor</h3>
                  <a  style="margin-left: 10px;" href="javascript:null(0)" id='add_sucursales'>Agregar Nueva</a>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody id='extrasucursales'>
                     <tr >
                      <th>Nombre</th>
                      <th>Dirección</th>
                      <th>Horarios</th>
                      <th></th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['sucursales']);$i++){ ?>
                    <tr  id="sucursales<?php echo $i ?>">
                      
                      <td><?php echo $form['sucursales'][$i]['nombre'] ?></td>
                      <td><?php echo $form['sucursales'][$i]['direccion'] ?></td>
                      <td><?php echo $form['sucursales'][$i]['horario'] ?></td>
                      
                    <td>
                         
                         <button class="btn btn-social-icon btn-google-plus" onclick="removeEtiqueta('sucursales<?php echo $i ?>','<?php echo url_for('proveedor/delSucursal')."?id=".$form['sucursales'][$i]['id']->getValue() ?>')" type="button"><i class="fa fa-bitbucket"></i></button>
                        
                     </td>
                    </tr>
                    <?php } ?>
                  </tbody></table>
                </div><!-- /.box-body -->
                            
                      
                      
                      
                      
                      
                
                </div></div>    
                    
                <div class="tab-pane " id="tab_4">  
                  <div class="box-body">
                
                      
                    <div class="form-group col-md-6 <?php if($form['logo']->renderError()) echo "has-error"; ?>">
                      <label for="logo"><?php if($form['logo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Logo</label>
                      <?php  echo $form['logo'];?>
                    </div>
                      
                    <div class="form-group  col-md-6  <?php if($form['video']->renderError()) echo "has-error"; ?>">
                      <label for="video"><?php if($form['video']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Video</label>
                      <?php  echo $form['video'];?>
                    </div>
                      <div style="clear: both"></div>
                      
                    <div class="box-header">
                  <h3 class="box-title">Galeria de fotos</h3>
                  <a  style="margin-left: 10px;" href="javascript:null(0)" id='add_galerias'>Agregar Nueva</a>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody id='extragalerias'>
                     <tr >
                      <th>Foto</th>
                      <th>Descripción</th>
                      <th></th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['galerias']);$i++){ ?>
                    <tr  id="galerias<?php echo $i ?>">
                      <td><?php echo $form['galerias'][$i]['imagen'] ?></td>
                      <td><?php echo $form['galerias'][$i]['descripcion'] ?></td>
                    <td>
                         
                         <button class="btn btn-social-icon btn-google-plus" onclick="removeEtiqueta('galerias<?php echo $i ?>','<?php echo url_for('galerias/delGalerias')."?id=".$form['galerias'][$i]['id']->getValue() ?>')" type="button"><i class="fa fa-bitbucket"></i></button>
                        
                     </td>
                    </tr>
                    <?php } ?>
                  </tbody></table>
                </div><!-- /.box-body -->  
                      
                      
                      <div style="clear: both"></div>
                          
                      
                </div></div>
                
                
                <div class="tab-pane " id="tab_5">  
                  <div class="box-body">
                      
                      
                      <div class="form-group col-md-12 <?php if($form['palabras_claves']->renderError()) echo "has-error"; ?>">
                      <label for="logo"><?php if($form['palabras_claves']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Palabras claves</label>
                      <?php  echo $form['palabras_claves'];?>
                    </div>
                      
                           
               <div class="form-group col-md-12"> 
                
                  <table class="table table-striped">
                    <tbody id='extrasucursales'>
                     <tr >
                      <th>Red Social</th>
                      <th>Dirección</th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['redes']);$i++){ ?>
                    <tr id="sucursales<?php echo $i ?>">
                      
                        <td>
                          <img style="margin-right: 10px" src="/uploads/redes/<?php echo sfContext::getInstance()->getUser()->getAttribute('red_imagen'.$form['redes'][$i]['rede_id']->getValue()); ?>">
                          <?php echo sfContext::getInstance()->getUser()->getAttribute('red'.$form['redes'][$i]['rede_id']->getValue()); ?></td>
                      <td>
                          <?php echo $form['redes'][$i]['rede_id'] ?>
                          <?php echo $form['redes'][$i]['direccion'] ?></td>
                    
                    </tr>
                    <?php } ?>
                  </tbody></table>
                </div></div>
                
                
                
                      <div style="clear: both"></div>
                
                </div>
                    
                  
                    
                 <div class="tab-pane " id="tab_7">  
                  <div class="box-body">
                      
                      
                      
                      <div class="form-group col-md-12"> 
                
                  <table class="table table-striped">
                    <tbody id='extrapagos'>
                     <tr>
                      <th>Pago</th>
                      <th>Activar</th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['pagos']);$i++){ ?>
                    
                    <tr id="pagos<?php echo $i ?>">
                      
                      <td>
                          <img src="/uploads/pago/<?php echo sfContext::getInstance()->getUser()->getAttribute('pago_imagen'.$form['pagos'][$i]['pago_id']->getValue()); ?>">
                          <?php echo sfContext::getInstance()->getUser()->getAttribute('pago'.$form['pagos'][$i]['pago_id']->getValue()); ?></td>
                      <td>
                          <?php echo $form['pagos'][$i]['pago_id'] ?>
                          <?php echo $form['pagos'][$i]['valor'] ?></td>
                    
                    </tr>
                    
                    <?php } ?>
                  </tbody></table>
                </div>
                      
                      
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
            
  
        
    $('#proveedor_ciudad_id').addClass('form-control');
    $('#proveedor_provincia_id').addClass('form-control');
    
    
    
var prec = <?php print_r($form['sucursales']->count())?>;


 $('#add_sucursales').click(function() {
    
    $("#extrasucursales").append(addSucursal(prec));
    prec = prec + 1;
  });


function addSucursal(num) {
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('proveedor/addSucursalForm')?>'+'<?php echo   ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
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
    
    
    
var prec = <?php print_r($form['galerias']->count())?>;


 $('#add_galerias').click(function() {
    
    
    $("#extragalerias").append(addGaleria(prec));
    prec = prec + 1;
  });


function addGaleria(num) {
    
    
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('/proveedor/addGaleriaForm')?>'+'<?php echo   ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
    async: false
  }).responseText;
  return r;
}
    
    
 
    
var precRed = <?php print_r($form['redes']->count())?>;


 $('#add_redes').click(function() {
    
    $("#extraredes").append(addRed(precRed));
    prec = prec + 1;
  });


function addRed(num) {
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('proveedor/addRedForm')?>'+'<?php echo   ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
    async: false
  }).responseText;
  return r;
}

</script>