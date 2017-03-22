<?php

/**
 * sfGuardUser filter form.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{
  public function configure()
  {
      unset(
              $this['empresa_id'],
              $this['algorithm'],
              $this['salt'],
              $this['password'],
              $this['created_at'],
              $this['updated_at'],
              $this['groups_list'],
              
              $this['last_login']
              
      ); 
      
//      $this->widgetSchema['permissions_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['permissions_list']->setLabel('Lista de Perfiles');
  }
}
