   <link href="/plugins/empresa_seccionpicker/bootstrap-empresa_seccionpicker.min.css" rel="stylesheet"/>
    <!-- Bootstrap time Picker -->
    <link href="/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

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
                  <h3 class="box-title">Formulario de Secciones - Quienes somos</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/seccion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                  <div class="box-body">
                   
                      
                    
                    

                    <div class="form-group col-md-12 <?php if($form['titulo']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['titulo']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Titulo</label>
                      <?php  echo $form['titulo'];?>
                    </div>
                     
                    <div class="form-group col-md-12 <?php if($form['descripcion']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['descripcion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Descripcion</label>
                      <?php  echo $form['descripcion'];?>
                    </div>
                      
                    <div class="form-group col-md-4 <?php if($form['imagen']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['imagen']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Imagen (280x - 280px)</label>
                      <?php  echo $form['imagen'];?>
                    </div>
                  
                      <div style="clear: both"></div>
                 
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
      
