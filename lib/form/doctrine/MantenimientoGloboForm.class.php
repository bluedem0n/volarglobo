<?php

/**
 * MantenimientoGlobo form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MantenimientoGloboForm extends BaseMantenimientoGloboForm
{
  public function configure()
  {
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['globo_id']
      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      
      $this->widgetSchema['fecha'] = new sfWidgetFormInputText(array(),array('placeholder'=>'00/00/0000','readonly'=>"true",'class' => 'form-control date'));
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones','class' => 'form-control'));
      $this->widgetSchema['realizado_por'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Realizado por','class' => 'form-control'));
      
      
      
      
      
  }
}
