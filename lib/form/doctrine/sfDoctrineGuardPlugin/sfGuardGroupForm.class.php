<?php

/**
 * sfGuardGroup form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardGroupForm extends PluginsfGuardGroupForm
{
  public function configure()
  {
      $this->widgetSchema['name']->setLabel('Nombre');
      $this->widgetSchema['description']->setLabel('Descripcion');


      $this->widgetSchema['permissions_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['permissions_list']->setLabel('Listado de Perfiles');

      $this->widgetSchema['users_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['users_list']->setLabel('Listado de Usuarios');
  }
}
