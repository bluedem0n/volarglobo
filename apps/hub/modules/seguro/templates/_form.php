
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
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/hub_dev.php/seguro/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                    
                    
                    
                    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos básicos</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Precio</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Beneficios</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">  
                  <div class="box-body">
                  
                    
                      
                      
                    <div class="form-group col-md-3 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Nombre:</label>
                      <?php  echo $form['nombre'];?>
                    </div>  
                   
                      <div class="form-group col-md-3 <?php if($form['dia']->renderError()) echo "has-error"; ?>">
                      <label for="dia"><?php if($form['dia']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Día:</label>
                      <?php  echo $form['dia'];?>
                    </div> 
                      
                      <div class="form-group col-md-3 <?php if ($form['seguro_tipo_id']->renderError()) echo "has-error"; ?>">
                          <label for="seguro_tipo_id"><?php if ($form['seguro_tipo_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Tipo:</label>
                          <?php echo $form['seguro_tipo_id']; ?>
                      </div>

                      <div class="form-group col-md-3 <?php if ($form['seguro_plan_id']->renderError()) echo "has-error"; ?>">
                          <label for="seguro_plan_id"><?php if ($form['seguro_plan_id']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Tipo de plan:</label>
                          <?php echo $form['seguro_plan_id']; ?>
                      </div>
                      
                      <div class="form-group  col-md-12">
                          <label for="descripcion">Descripción breve</label>
                          <?php echo $form['descripcion']; ?>
                      </div>
                                            
                      <div style="clear: both"></div>

                    
                  </div><!-- /.box-body -->
                  </div>
                  
                  <div class="tab-pane" id="tab_2">  
                      <div class="box-body">

                      <div style="clear: both"></div>


                  </div><!-- /.box-body -->
                  </div>
                  
                  <!--Beneficios-->
                  <div class="tab-pane" id="tab_3">  
                      <div class="box-body">
                        
                          <div class="form-group col-md-12"> 

                              <table class="table table-striped">
                                  <tbody id='extrahabitaciones'>
                                      <tr >
                                          <th>Beneficio</th>
                                          <th>Valor</th>
                                      </tr>

                                      <?php for ($i = 0; $i < count($form['beneficios']); $i++) { ?>
                                          <tr id="habitaciones<?php echo $i ?>">
                                              <td><?php echo sfContext::getInstance()->getUser()->getAttribute('seguros_beneficios'.$form['beneficios'][$i]['seguro_beneficio_id']->getValue()); ?>
                                                  <?php 
                                                  //Imprimir todos los valores ocultos del formulario
                                                  echo $form['beneficios'][$i]->renderHiddenFields(true); ?>
                                              </td>
                                              <td><?php echo $form['beneficios'][$i]['valor'] ?></td>

                                          </tr>
                                      <?php } ?>
                                  </tbody></table>
                          </div>  
                          
                          
                      <div style="clear: both"></div>


                  </div><!-- /.box-body -->
                  </div>
                  
                  <div class="tab-pane" id="tab_4">  
                      <div class="box-body">
                          
                      <div style="clear: both"></div>


                  </div><!-- /.box-body -->
                  </div>
                  <div class="tab-pane" id="tab_5">  
                      <div class="box-body">
                          
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
            
    $('#seguro_beneficios_0_valor').addClass('form-control');
    
</script>
        