<?php

/**
 * ProveedorPago form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProveedorPagoForm extends BaseProveedorPagoForm
{
  public function configure()
  {
      
      
        unset (
        $this['created_at'],
        $this['updated_at'],
        $this['proveedor_id']

      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));

      $this->widgetSchema['pago_id'] = new sfWidgetFormInputHidden(array(),array()); 
      
      //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['valor'] = new sfWidgetFormChoice(array(
         'choices' => Categoria::$status,
         'expanded' => false,
         'multiple' => false

      ),array('class' => 'form-control'));

      
      
      
  }
}
