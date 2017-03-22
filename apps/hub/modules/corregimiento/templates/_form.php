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
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Formulario de corregimiento</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/corregimiento/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                  <div class="box-body">
                   
                    
                    <div class="form-group col-md-6<?php if($form['provincia_id']->renderError()) echo "has-error"; ?>">
                      <label for="provincia_id"><?php if($form['provincia_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Provincia</label>
                      <?php  echo $form['provincia_id'];?>
                    </div>

                    <div class="form-group col-md-6<?php if($form['ciudad_id']->renderError()) echo "has-error"; ?>">
                      <label for="ciudad_id"><?php if($form['ciudad_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> provincia/estado</label>
                      <?php  echo $form['ciudad_id'];?>
                    </div>   
                    <div class="form-group <?php if($form['municipio_id']->renderError()) echo "has-error"; ?>">
                      <label for="municipio_id"><?php if($form['municipio_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> distrito</label>
                      <?php  echo $form['municipio_id'];?>
                    </div>   

                  
                      <div class="form-group col-md-2<?php if($form['cp']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['cp']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Código postal</label>
                      <?php  echo $form['cp'];?>
                    </div>
                      
                    <div class="form-group col-md-5 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nombre</label>
                      <?php  echo $form['nombre'];?>
                    </div>
                      
                    <div class="form-group col-md-5 <?php if($form['status']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['status']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Status</label>
                      <?php  echo $form['status'];?>
                    </div>
                      
                    <div class="form-group <?php if($form['observacion']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['observacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
                      <?php  echo $form['observacion'];?>
                    </div>
                  
                  
                    
                      
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   <?php echo $form->renderHiddenFields(false) ?>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </div>
                </form>
              </div><!-- /.box -->

             
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      
<script type="text/javascript">
    $('#parroquia_ciudad_id').addClass('form-control');
    $('#parroquia_municipio_id').addClass('form-control');
    
</script>