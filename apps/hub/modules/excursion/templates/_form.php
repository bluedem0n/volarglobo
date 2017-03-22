
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
                <form class="filtroRangos" role="form" id="myForm" action="<?php echo url_for('/hub_dev.php/excursion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                <?php if (!$form->getObject()->isNew()): ?>
                <?php echo $form->renderGlobalErrors() ?>
                    <input type="hidden" name="sf_method" value="put" />
                    <?php endif; ?>
                    
                    
                    
                    <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Datos básicos</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Precio</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Requisitos</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Políticas</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Adicionales</a></li>
                  <li><a href="#tab_6" data-toggle="tab">Lugares de interés</a></li>
                  <li><a href="#tab_7" data-toggle="tab">Inclusiones</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">  
                  <div class="box-body">
                  
                    
                      
                      
                    <div class="form-group col-md-3 <?php if($form['nombre']->renderError()) echo "has-error"; ?>">
                      <label for="nombre"><?php if($form['nombre']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Nombre:</label>
                      <?php  echo $form['nombre'];?>
                    </div>  
                   
                      <div class="form-group col-md-3 <?php if($form['imagen']->renderError()) echo "has-error"; ?>">
                      <label for="imagen"><?php if($form['imagen']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Imágen:</label>
                      <?php  echo $form['imagen'];?>
                    </div> 
                      
                      <div class="form-group col-md-3 <?php if ($form['ubicacion']->renderError()) echo "has-error"; ?>">
                          <label for="ubicacion"><?php if ($form['ubicacion']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Ubicación:</label>
                          <?php echo $form['ubicacion']; ?>
                      </div>

                      <div class="form-group col-md-3 <?php if ($form['fecha']->renderError()) echo "has-error"; ?>">
                          <label for="fecha"><?php if ($form['fecha']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Fecha:</label>
                          <?php echo $form['fecha']; ?>
                      </div>
                      
                      <div class="form-group col-md-3 <?php if ($form['tipo_publico']->renderError()) echo "has-error"; ?>">
                          <label for="tipo_publico"><?php if ($form['tipo_publico']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Tipo de público:</label>
                          <?php echo $form['tipo_publico']; ?>
                      </div>
                      
                      <div class="form-group col-md-3 <?php if ($form['capacidad_persona']->renderError()) echo "has-error"; ?>">
                          <label for="capacidad_persona"><?php if ($form['capacidad_persona']->renderError()) echo '<i class="fa fa-times-circle-o"></i>'; ?>Capacidad de personas:</label>
                          <?php echo $form['capacidad_persona']; ?>
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
                                          <th>Requisitos</th>
                                          <th>Valor</th>
                                      </tr>

                                      <?php for ($i = 0; $i < count($form['requisitos']); $i++) { ?>
                                          <tr id="habitaciones<?php echo $i ?>">
                                              <td><?php echo sfContext::getInstance()->getUser()->getAttribute('excursiones_requisitos'.$form['requisitos'][$i]['excursion_requisito_id']->getValue()); ?>
                                                  <?php 
                                                  //Imprimir todos los valores ocultos del formulario
                                                  echo $form['requisitos'][$i]->renderHiddenFields(true); ?>
                                              </td>
                                              <td><?php echo $form['requisitos'][$i]['valor'] ?></td>

                                          </tr>
                                      <?php } ?>
                                  </tbody></table>
                          </div>  
                          
                          
                      <div style="clear: both"></div>


                  </div><!-- /.box-body -->
                  </div>
                  
                  <div class="tab-pane" id="tab_4">  
                      <div class="box-body">
                          <div class="form-group col-md-12"> 

                              <table class="table table-striped">
                                  <tbody id='extrahabitaciones'>
                                      <tr >
                                          <th>Políticas</th>
                                          <th>Valor</th>
                                      </tr>

                                      <?php for ($i = 0; $i < count($form['politicas']); $i++) { ?>
                                          <tr id="habitaciones<?php echo $i ?>">
                                              <td><?php echo sfContext::getInstance()->getUser()->getAttribute('excursiones_politicas'.$form['politicas'][$i]['excursion_politica_id']->getValue()); ?>
                                                  <?php 
                                                  //Imprimir todos los valores ocultos del formulario
                                                  echo $form['politicas'][$i]->renderHiddenFields(true); ?>
                                              </td>
                                              <td><?php echo $form['politicas'][$i]['valor'] ?></td>

                                          </tr>
                                      <?php } ?>
                                  </tbody></table>
                          </div>
                      <div style="clear: both"></div>


                  </div><!-- /.box-body -->
                  </div>
                  <div class="tab-pane" id="tab_5">  
                      <div class="box-body">
                          <div class="form-group col-md-12"> 

                              <table class="table table-striped">
                                  <tbody id='extrahabitaciones'>
                                      <tr >
                                          <th>Adicionales</th>
                                          <th>Valor</th>
                                      </tr>

                                      <?php for ($i = 0; $i < count($form['adicionales']); $i++) { ?>
                                          <tr id="habitaciones<?php echo $i ?>">
                                              <td><?php echo sfContext::getInstance()->getUser()->getAttribute('excursiones_adicionales' . $form['adicionales'][$i]['excursion_adicional_id']->getValue()); ?>
                                                  <?php
                                                  //Imprimir todos los valores ocultos del formulario
                                                  echo $form['adicionales'][$i]->renderHiddenFields(true);
                                                  ?>
                                              </td>
                                              <td><?php echo $form['adicionales'][$i]['valor'] ?></td>

                                          </tr>
                                       <?php } ?>
                                  </tbody></table>
                          </div>
                      <div style="clear: both"></div>


                  </div><!-- /.box-body -->
                  </div>
                  
                  <div class="tab-pane" id="tab_6">  
                      <div class="box-body">
                          <div class="form-group col-md-12"> 

                              <table class="table table-striped">
                                  <tbody id='extrahabitaciones'>
                                      <tr >
                                          <th>Lugares de Interés</th>
                                          <th>Valor</th>
                                      </tr>

                                      <?php for ($i = 0; $i < count($form['lugar_intereses']); $i++) { ?>
                                          <tr id="habitaciones<?php echo $i ?>">
                                              <td><?php echo sfContext::getInstance()->getUser()->getAttribute('excursiones_lugar_intereses' . $form['lugar_intereses'][$i]['excursion_lugar_interes_id']->getValue()); ?>
                                                  <?php
                                                  //Imprimir todos los valores ocultos del formulario
                                                  echo $form['lugar_intereses'][$i]->renderHiddenFields(true);
                                                  ?>
                                              </td>
                                              <td><?php echo $form['lugar_intereses'][$i]['valor'] ?></td>

                                          </tr>
                                      <?php } ?>
                                  </tbody></table>
                          </div>
                          <div style="clear: both"></div>


                      </div><!-- /.box-body -->
                  </div>
                  
                  <div class="tab-pane" id="tab_7">  
                      <div class="box-body">
                          <div class="form-group col-md-12"> 

                              <table class="table table-striped">
                                  <tbody id='extrahabitaciones'>
                                      <tr >
                                          <th>Inclusión</th>
                                          <th>Valor</th>
                                      </tr>

                                      <?php for ($i = 0; $i < count($form['inclusiones']); $i++) { ?>
                                          <tr id="habitaciones<?php echo $i ?>">
                                              <td><?php echo sfContext::getInstance()->getUser()->getAttribute('excursiones_inclusiones' . $form['inclusiones'][$i]['excursion_inclusion_id']->getValue()); ?>
                                                  <?php
                                                  //Imprimir todos los valores ocultos del formulario
                                                  echo $form['inclusiones'][$i]->renderHiddenFields(true);
                                                  ?>
                                              </td>
                                              <td><?php echo $form['inclusiones'][$i]['valor'] ?></td>

                                          </tr>
                                      <?php } ?>
                                  </tbody></table>
                          </div>
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
            
    $('#excursion_beneficios_0_valor').addClass('form-control');
    
</script>
        