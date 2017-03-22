<?php

/**
 * VehiculoPrecio form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VehiculoPrecioForm extends BaseVehiculoPrecioForm
{
  public function configure()
  {
                  
          //Eliminar los campos del formularios  created_at y updated_at
        unset(
                $this['created_at'], $this['updated_at'], $this['vehiculo_id']
        );

  $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
  $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user')));
  $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
     

  $this->widgetSchema['precio'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));
  
  
  
  
  $this->widgetSchema['provincia_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'Provincia',
                ), array('class' => 'form-control'));

        $this->widgetSchema['ciudad_id'] = new sfWidgetFormDoctrineDependentSelect(array(
            'model' => 'Ciudad',
            'depends' => 'Provincia',
            'table_method' => 'getNombre',
            'add_empty' => 'Seleccione ciudad inicial',
        ));
        
        
        
        $this->widgetSchema['provincia_final_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'ProvinciaFinal',
                ), array('class' => 'form-control'));

        $this->widgetSchema['ciudad_final_id'] = new sfWidgetFormDoctrineDependentSelect(array(
            'model' => 'CiudadFinal',
            'depends' => 'ProvinciaFinal',
            'table_method' => 'getFinalNombre',
            'key_method'   => 'getId',
            'add_empty' => 'Seleccione ciudad destino',
        ));
    }
}
