<tr id="precios<?php echo $num ?>">
          
                      
                      <td><?php echo $form['precios'][$num]['precio'] ?></td>
                      
              <td>

                      <button  class="btn btn-social-icon btn-google-plus" id="dele_precios<?php echo $num ?>" type="button"><i class="fa fa-bitbucket"></i></button>
                      <?php
                             //Imprimir todos los valores ocultos del formulario
                             echo $form['precios'][$num]->renderHiddenFields(true);
                             ?>
                      <script type="text/javascript">
                        $('#dele_precios<?php echo $num ?>').click(function() {

                          $("#precios<?php echo $num ?>").remove();

                        });
                      </script>
                      
                            

              </td>
</tr>