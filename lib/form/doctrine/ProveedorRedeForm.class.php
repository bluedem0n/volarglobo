<?php

/**
 * ProveedorRede form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProveedorRedeForm extends BaseProveedorRedeForm
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

      $this->widgetSchema['rede_id'] = new sfWidgetFormInputHidden(array(),array()); 
     
       $this->widgetSchema['direccion'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Dirección de la red social','class' => 'form-control'));
       
      
       
       
       
  }
}
