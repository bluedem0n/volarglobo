<?php

/**
 * VueloHospedaje form base class.
 *
 * @method VueloHospedaje getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVueloHospedajeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'empresa_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'proveedor_vuelo_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorVuelo'), 'add_empty' => false)),
      'hospedaje_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hospedaje'), 'add_empty' => true)),
      'hospedaje_habitacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HospedajeHabitacion'), 'add_empty' => true)),
      'cantidad'                => new sfWidgetFormTextarea(),
      'cantidad_personas'       => new sfWidgetFormTextarea(),
      'check_in'                => new sfWidgetFormDate(),
      'check_out'               => new sfWidgetFormDate(),
      'precio'                  => new sfWidgetFormTextarea(),
      'user_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'               => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'proveedor_vuelo_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorVuelo'))),
      'hospedaje_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Hospedaje'), 'required' => false)),
      'hospedaje_habitacion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('HospedajeHabitacion'), 'required' => false)),
      'cantidad'                => new sfValidatorString(array('required' => false)),
      'cantidad_personas'       => new sfValidatorString(array('required' => false)),
      'check_in'                => new sfValidatorDate(array('required' => false)),
      'check_out'               => new sfValidatorDate(array('required' => false)),
      'precio'                  => new sfValidatorString(array('required' => false)),
      'user_id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vuelo_hospedaje[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VueloHospedaje';
  }

}
