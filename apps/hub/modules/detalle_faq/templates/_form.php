   <link href="/plugins/detalle_faqpicker/bootstrap-detalle_faqpicker.min.css" rel="stylesheet"/>
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
                  <h3 class="box-title">Formulario de detalle_faq</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/detalle_faq/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                  <div class="box-body">
                   
                      
                    <div class="form-group col-md-12 <?php if($form['categoria_faq_id']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['categoria_faq_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Categoria FAQ</label>
                      <?php  echo $form['categoria_faq_id'];?>
                    </div>
                    

                      <div class="form-group col-md-12 <?php if($form['pregunta']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['pregunta']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Pregunta</label>
                      <?php  echo $form['pregunta'];?>
                    </div>
                      
                      <div class="form-group col-md-12 <?php if($form['respuesta']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['respuesta']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?> Respuesta</label>
                      <?php  echo $form['respuesta'];?>
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
      
