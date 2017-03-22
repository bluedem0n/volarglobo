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
                  <h3 class="box-title">Formulario de ubicaciones</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('ubicacion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                  <div class="box-body">
                   
                      
                    <div class="form-group col-md-8 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nombre</label>
                      <?php  echo $form['nombre'];?>
                    </div>
                      
                    <div class="form-group col-md-4 <?php if($form['google_map']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['google_map']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> GoogleMaps</label>
                      <?php  echo $form['google_map'];?>
                    </div>  

                    <div class="form-group col-md-12 <?php if($form['direccion']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['direccion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Dirección</label>
                      <?php  echo $form['direccion'];?>
                    </div>
                      
                    <div class="form-group  col-md-12 <?php if($form['observacion']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['observacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Observaciones</label>
                      <?php  echo $form['observacion'];?>
                    </div>
                  
                      <div style="clear: both"></div>
                          
                      
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   <?php echo $form->renderHiddenFields(false) ?>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                  </div>
                </form>
              </div><!-- /.box -->

             
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      
