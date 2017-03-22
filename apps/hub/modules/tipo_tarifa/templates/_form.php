
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
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/tipo_tarifa/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos básicos</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Rango de precios</a></li>
                  
                  
                  
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">  
                  <div class="box-body">
                       
                    <div class="form-group col-md-4  <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nombre</label>
                      <?php  echo $form['nombre'];?>
                    </div>
                      
                    <div class="form-group col-md-2  <?php if($form['tipo_vuelo_id']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['tipo_vuelo_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Tipo vuelo</label>
                      <?php  echo $form['tipo_vuelo_id'];?>
                    </div>
                      
                     <div class="form-group col-md-2  <?php if($form['cant_desde']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['cant_desde']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Cantidad PAX desde</label>
                      <?php  echo $form['cant_desde'];?>
                    </div> 
                      
                      <div class="form-group col-md-2  <?php if($form['cant_hasta']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['cant_hasta']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Cantidad PAX hasta</label>
                      <?php  echo $form['cant_hasta'];?>
                    </div> 
                      
                      <div class="form-group col-md-2 <?php if($form['status']->renderError()) echo "has-error"; ?>">
                      <label for="nickname"><?php if($form['status']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Status</label>
                      <?php  echo $form['status'];?>
                    </div>
               
                      
                    <div class="form-group  col-md-12 <?php if($form['descripcion']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['descripcion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Descripción</label>
                      <?php  echo $form['descripcion'];?>
                    </div>
                      
                      
                      <div style="clear: both"></div>
                   
                      
                   
                    
                  </div><!-- /.box-body -->

                  </div>
                  
                <div class="tab-pane" id="tab_2">  
                  
                      <div class="box-body">
                      
                          
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody id='extraprecios'>
                     <tr >
                      <th>Rango de edad</th>
                      <th>Precio</th>
                      
                    </tr>
                    
                    <?php for($i=0;$i<count($form['precios']);$i++){ ?>
                    <tr  id="precios<?php echo $i ?>">
                      <td>
                          <?php echo sfContext::getInstance()->getUser()->getAttribute('rango_edad'.$form['precios'][$i]['rango_edad_id']->getValue()) ?>
                          <?php echo $form['precios'][$i]['rango_edad_id']; ?></td>
                      <td><?php echo $form['precios'][$i]['precio'] ?></td>
                    
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
            
  
        
    
    
</script>

