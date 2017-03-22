<tr id="galerias<?php echo $num ?>">
           <td><?php echo $form['galerias'][$num]['imagen'] ?></td>
           <td><?php echo $form['galerias'][$num]['descripcion'] ?>
           </td>
              <td>

                      <button  class="btn btn-social-icon btn-google-plus" id="dele_galerias<?php echo $num ?>" type="button"><i class="fa fa-bitbucket"></i></button>

                      <script type="text/javascript">
                        $('#dele_galerias<?php echo $num ?>').click(function() {

                          $("#galerias<?php echo $num ?>").remove();

                        });
                      </script>
                      
                            

              </td>
</tr>