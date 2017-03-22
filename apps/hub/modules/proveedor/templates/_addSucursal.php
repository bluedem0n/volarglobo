<tr id="sucursales<?php echo $num ?>">
          <td><?php echo $form['sucursales'][$num]['nombre'] ?></td>
                      <td><?php echo $form['sucursales'][$num]['direccion'] ?></td>
                      <td><?php echo $form['sucursales'][$num]['horario'] ?></td>
              <td>

                      <button  class="btn btn-social-icon btn-google-plus" id="dele_sucursales<?php echo $num ?>" type="button"><i class="fa fa-bitbucket"></i></button>

                      <script type="text/javascript">
                        $('#dele_sucursales<?php echo $num ?>').click(function() {

                          $("#sucursales<?php echo $num ?>").remove();

                        });
                      </script>
                      
                            

              </td>
</tr>