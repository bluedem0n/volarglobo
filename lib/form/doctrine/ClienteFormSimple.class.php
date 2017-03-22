<?php

/**
 * Proveedor form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProveedorFormSimple extends BaseProveedorForm
{
  public function configure()
  {
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['expires_at'] 
              
      );
      

        
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del proveedor','class' => 'form-control'));
      $this->widgetSchema['rif'] = new sfWidgetFormInputText(array(),array('placeholder'=>'RUC','class' => 'form-control'));
      $this->widgetSchema['dni'] = new sfWidgetFormInputText(array(),array('placeholder'=>'DNI','class' => 'form-control'));
      $this->widgetSchema['status'] = new sfWidgetFormInputHidden(array(),array('value'=> '1'));
      
      
      $this->widgetSchema['provincia_id'] = new sfWidgetFormInputHidden(array(),array('value'=> '166'));
      $this->widgetSchema['ciudad_id'] = new sfWidgetFormInputHidden(array(),array('value'=> '3'));
      $this->widgetSchema['municipio_id'] = new sfWidgetFormInputHidden(array(),array('value'=> '3'));
      $this->widgetSchema['parroquia_id'] = new sfWidgetFormInputHidden(array(),array('value'=> '3'));
      

  }
    
   
  
    
    
}
