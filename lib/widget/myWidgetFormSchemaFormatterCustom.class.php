<?php

class myWidgetFormSchemaFormatterCustom extends sfWidgetFormSchemaFormatter
{

  protected
    $rowFormat       = "<tr>\n  <th>%label%</th>\n  <td>prueba %error%%field%%help%%hidden_fields%</td>\n</tr>\n",
    $errorRowFormat  = "<tr><td colspan=\"2\">\n%errors%</td></tr>\n",
    $helpFormat      = '<br />%help%',
    $decoratorFormat = "<table>\n  %content%</table>";
}
?>
