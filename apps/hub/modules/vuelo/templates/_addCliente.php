<tr id="clientes<?php echo $num ?>">
          <td><?php echo $form['clientes'][$num]['cliente_id'] ?></td>                      
              <td>

                      <button  class="btn btn-social-icon btn-google-plus" id="dele_clientes<?php echo $num ?>" type="button"><i class="fa fa-bitbucket"></i></button>

                      <script type="text/javascript">
                        $('#dele_clientes<?php echo $num ?>').click(function() {

                          $("#clientes<?php echo $num ?>").remove();

                        });
                      </script>
                      
                            

              </td>
</tr>