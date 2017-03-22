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
                  <h3 class="box-title">Formulario de perfiles</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('perfil/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                  <div class="box-body">
                    
                     
                      
                    <div class="form-group <?php if($form['name']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['name']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Nombre</label>
                      <?php  echo $form['name'];?>
                    </div>
                      
                    <div class="form-group">
                      <label for="descripcion_breve">Descripción breve</label>
                      <?php  echo $form['description'];?>
                    </div>
                      
                    <div class="form-group">
                      <label for="descripcion_breve" style="border-bottom: 1px solid #ccc;padding-bottom:5px; width: 100%">Descripción breve</label>
                      <div style="clear:both; padding-bottom:10px;"></div>
                      <?php  echo $form['detalles'];?>
                    </div>
                      
                      <div style="clear:both; padding-top:20px;"></div>
                          
                    <div class="form-group <?php if($form['status']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['status']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Status</label>
                      <?php  echo $form['status'];?>
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
      
