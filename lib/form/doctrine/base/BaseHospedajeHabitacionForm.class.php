<?php

/**
 * HospedajeHabitacion form base class.
 *
 * @method HospedajeHabitacion getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHospedajeHabitacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'empresa_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'hospedaje_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hospedaje'), 'add_empty' => false)),
      'tipo_habitacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoHabitacion'), 'add_empty' => false)),
      'tipo_cama'          => new sfWidgetFormTextarea(),
      'cantidad_personas'  => new sfWidgetFormInputText(),
      'nombre'             => new sfWidgetFormInputText(),
      'precio'             => new sfWidgetFormInputText(),
      'foto'               => new sfWidgetFormInputText(),
      'user_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'          => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'hospedaje_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Hospedaje'))),
      'tipo_habitacion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoHabitacion'))),
      'tipo_cama'          => new sfValidatorString(array('required' => false)),
      'cantidad_personas'  => new sfValidatorInteger(),
      'nombre'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'precio'             => new sfValidatorNumber(array('required' => false)),
      'foto'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'user_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('hospedaje_habitacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HospedajeHabitacion';
  }

}
