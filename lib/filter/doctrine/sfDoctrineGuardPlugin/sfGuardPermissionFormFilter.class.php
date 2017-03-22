<?php

/**
 * sfGuardPermission filter form.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardPermissionFormFilter extends PluginsfGuardPermissionFormFilter
{
  public function configure()
  {
       unset(
              $this['created_at'],
              $this['groups_list'],
              $this['users_list'],
              $this['updated_at']
              
      ); 
//     $this->widgetSchema['groups_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
//     $this->widgetSchema['groups_list']->setLabel('Lista de Grupos');
//     
//     $this->widgetSchema['users_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
//     $this->widgetSchema['users_list']->setLabel('Lista de Usuarios');
  }
}
