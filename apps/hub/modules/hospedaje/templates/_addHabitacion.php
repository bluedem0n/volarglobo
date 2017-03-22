<tr id="habitaciones<?php echo $num ?>">
          
                      
                      <td><?php echo $form['habitaciones'][$num]['nombre'] ?></td>
                      <td><?php echo $form['habitaciones'][$num]['tipo_habitacion_id'] ?></td>
                      <td><?php echo $form['habitaciones'][$num]['cantidad_personas'] ?></td>
                      <td style="font-size: 10px"><?php echo $form['habitaciones'][$num]['tipo_cama'] ?></td>
                      <td><?php echo $form['habitaciones'][$num]['precio'] ?></td>
                      
              <td>

                      <button  class="btn btn-social-icon btn-google-plus" id="dele_habitaciones<?php echo $num ?>" type="button"><i class="fa fa-bitbucket"></i></button>

                      <script type="text/javascript">
                        $('#dele_habitaciones<?php echo $num ?>').click(function() {

                          $("#habitaciones<?php echo $num ?>").remove();

                        });
                      </script>
                      
                            

              </td>
</tr>