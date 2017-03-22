<?php

/**
 * VehiculoPrecio form base class.
 *
 * @method VehiculoPrecio getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVehiculoPrecioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'empresa_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'vehiculo_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Vehiculo'), 'add_empty' => false)),
      'provincia_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'), 'add_empty' => false)),
      'ciudad_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => false)),
      'ubicacion_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => false)),
      'provincia_final_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProvinciaFinal'), 'add_empty' => false)),
      'ciudad_final_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CiudadFinal'), 'add_empty' => false)),
      'ubicacion_final_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UbicacionFinal'), 'add_empty' => false)),
      'precio'             => new sfWidgetFormInputText(),
      'user_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'          => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'vehiculo_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Vehiculo'))),
      'provincia_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'))),
      'ciudad_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'))),
      'ubicacion_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'))),
      'provincia_final_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProvinciaFinal'))),
      'ciudad_final_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CiudadFinal'))),
      'ubicacion_final_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UbicacionFinal'))),
      'precio'             => new sfValidatorNumber(),
      'user_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vehiculo_precio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VehiculoPrecio';
  }

}
