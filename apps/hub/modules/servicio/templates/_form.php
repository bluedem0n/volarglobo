
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
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/servicio/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                    
                    
                    
                    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos básicos</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Campos adicionales</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Observaciones</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Condiciones</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Galeria</a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">  
                  <div class="box-body">
                    
                      
                    <div class="form-group col-md-2 <?php if($form['tipo']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['tipo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Tipo de ingreso </label>
                      <?php  echo $form['tipo'];?>
                    </div>  
                      
                    <div class="form-group col-md-10 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Titulo</label>
                      <?php  echo $form['nombre'];?>
                    </div>  
                      
                   
                   <div class="form-group col-md-4 <?php if($form['categoria_id']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['categoria_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Categoría</label>
                      <?php  echo $form['categoria_id'];?>
                    </div> 
                      
                    
                    <div class="form-group col-md-4 <?php if($form['proveedor_id']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['proveedor_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Proveedor</label>
                      <?php  echo $form['proveedor_id'];?>
                    </div>
                      
                      
                     <div class="form-group col-md-4 <?php if($form['proveedor_sucursal_id']->renderError()) echo "has-error"; ?>">
                      <label for="rif"><?php if($form['proveedor_sucursal_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Sucursal</label>
                      <?php  echo $form['proveedor_sucursal_id'];?>
                      </div>
                      
                     
                      
                      
                      
                      
                      <div class="form-group col-md-2 <?php if($form['precio']->renderError()) echo "has-error"; ?>">
                      <label for="telefono2"><?php if($form['precio']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Precio original</label>
                      <?php  echo $form['precio'];?>
                    </div>
                      
                    <div class="form-group  col-md-2  <?php if($form['precio_oferta']->renderError()) echo "has-error"; ?>">
                      <label for="email"><?php if($form['precio_oferta']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Oferta</label>
                      <?php  echo $form['precio_oferta'];?>
                    </div>
                      
                    
                
                      
                      <div style="clear: both"></div>
                   
                      
                   
                      
                    
                  </div><!-- /.box-body -->

                  </div>
                  <div class="tab-pane" id="tab_2">  
                  
                      
                      
                  <div class="box-body"><div class="form-group <?php if($form['observacion']->renderError()) echo "has-error"; ?>">
                      <label for="direccion_fisica"><?php if($form['observacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
                      <?php  echo $form['observacion'];?>
                   </div>
                      
                      <div style="clear: both"></div>
                
                </div></div>
                    
                <div class="tab-pane " id="tab_3">  
                  <div class="box-body">
                      
                      
                      <div class="form-group <?php if($form['condiciones']->renderError()) echo "has-error"; ?>">
                      <label for="condiciones"><?php if($form['condiciones']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
                      <?php  echo $form['condiciones'];?>
                   </div>
                      
                      <div style="clear: both"></div>
                      
                
                </div></div>    
                    
                <div class="tab-pane " id="tab_4">  
                  <div class="box-body">
                
                      
                    <div class="form-group col-md-6 <?php if($form['imagen_uno']->renderError()) echo "has-error"; ?>">
                      <label for="logo"><?php if($form['imagen_uno']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Logo</label>
                      <?php  echo $form['imagen_uno'];?>
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
                    <tr  id="sucursales<?php echo $i ?>">
                      <td><?php echo $form['galerias'][$i]['imagen'] ?></td>
                      <td><?php echo $form['galerias'][$i]['descripcion'] ?></td>
                    <td>
                         
                         <button class="btn btn-social-icon btn-google-plus" onclick="removeEtiqueta('galerias<?php echo $i ?>','<?php echo url_for('servicio/delGalerias')."?id=".$form['galerias'][$i]['id']->getValue() ?>')" type="button"><i class="fa fa-bitbucket"></i></button>
                        
                     </td>
                    </tr>
                    <?php } ?>
                  </tbody></table>
                </div><!-- /.box-body -->
                            
                      <div style="clear: both"></div>
                          
                      
                </div></div>
                
                    <div class="tab-pane " id="tab_5">  
                  <div class="box-body">
                      
                     
                           
               <div class="form-group col-md-12"> 
                
                  <table class="table table-striped">
                    <tbody id='extrasucursales'>
                     <tr >
                      <th>Campo</th>
                      <th>valor</th>
                    </tr>
                    
                    <?php for($i=0;$i<count($form['campos']);$i++){ ?>
                    <tr id="sucursales<?php echo $i ?>">
                      
                        <td>
                          <?php echo sfContext::getInstance()->getUser()->getAttribute('red'.$form['campos'][$i]['campo_id']->getValue()); ?></td>
                      <td>
                          <?php echo $form['campos'][$i]['campo_id'] ?>
                          <?php echo $form['campos'][$i]['valor'] ?></td>
                    
                    </tr>
                    <?php } ?>
                  </tbody></table>
                </div></div>
                
                
                
                      <div style="clear: both"></div>
                
                </div>
                    
                    
                    
                 
                  <div class="box-footer">
                   <?php echo $form->renderHiddenFields(false) ?>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </div>
                </form>
              </div><!-- /.box -->

             
            
            <!-- /.row -->
        </section><!-- /.content -->
      
<script type="text/javascript">
    
 <?php if($de) { ?>  
     
 
    $('#proveedor_descuento_proveedor_id option[value="<?php echo $de; ?>"]').attr('selected', 'selected'); 
 
 
 
 <?php } ?>
    
        
$('#proveedor_descuento_proveedor_sucursal_id').addClass('form-control');
    
var prec = <?php print_r($form['galerias']->count())?>;


 $('#add_galerias').click(function() {
    
    
    $("#extragalerias").append(addGaleria(prec));
    prec = prec + 1;
  });


function addGaleria(num) {
    
    
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('/servicio/addGaleriaForm')?>'+'<?php echo   ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
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
    
    

    
var precCampo = <?php print_r($form['campos']->count())?>;


 $('#add_campos').click(function() {
    
    $("#extracampos").append(addCampo(precCampo));
    prec = prec + 1;
  });


function addCampo(num) {
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('proveedor/addCampoForm')?>'+'<?php echo   ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
    async: false
  }).responseText;
  return r;
}

</script>