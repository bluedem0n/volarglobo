<?php

/**
 * TipoTarifaPrecio form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TipoTarifaPrecioForm extends BaseTipoTarifaPrecioForm
{
  public function configure()
  {
        unset (
        $this['created_at'],
        $this['updated_at'],
        $this['tipo_tarifa_id']

      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));

      $this->widgetSchema['rango_edad_id'] = new sfWidgetFormInputHidden(array(),array()); 
      
      //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['precio'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));

      
      
  }
}
