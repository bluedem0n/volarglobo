<?php

/**
 * ProveedorSucursal form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProveedorSucursalForm extends BaseProveedorSucursalForm
{
  public function configure()
  {
      
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['proveedor_id']

      );
      
       $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre','class' => 'form-control'));
       
   
       
       $this->widgetSchema['direccion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Dirección de la sucursal','class' => 'form-control'));
       $this->widgetSchema['horario'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Horario de la sucursal','class' => 'form-control'));
      
      
  }
}
