<?php

/**
 * VueloHospedaje form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VueloHospedajeForm extends BaseVueloHospedajeForm
{
  public function configure()
  {
      
     unset (
        $this['created_at'],
        $this['updated_at'],
        $this['proveedor_vuelo_id'],
        $this['precio']     

      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));

      
      $this->widgetSchema['check_in'] = new sfWidgetFormInputText(array(), array( 'placeholder'=>'00/00/0000','class' => 'form-control date', 'readonly' => 'true'));
      $this->widgetSchema['check_out'] = new sfWidgetFormInputText(array(), array( 'placeholder'=>'00/00/0000','class' => 'form-control date', 'readonly' => 'true'));
      
      
      $this->widgetSchema['hospedaje_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model'     => 'Hospedaje',
                    'add_empty' => 'Seleccione habitación'
      ),array('class' => 'form-control'));
      
      
      
      $this->widgetSchema['hospedaje_habitacion_id'] = new sfWidgetFormDoctrineDependentSelect(array(
	            'model'     => 'HospedajeHabitacion',
                    'depends'   => 'Hospedaje',
                    'table_method' => 'getNombre',
                    'add_empty' => 'Seleccione habitación'
      ));

      
  }
}
