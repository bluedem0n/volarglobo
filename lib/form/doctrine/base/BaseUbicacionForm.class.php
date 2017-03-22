<?php

/**
 * Ubicacion form base class.
 *
 * @method Ubicacion getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUbicacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'empresa_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'provincia_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'), 'add_empty' => false)),
      'ciudad_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => false)),
      'ciudad_final_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad2'), 'add_empty' => true)),
      'nombre'          => new sfWidgetFormInputText(),
      'direccion'       => new sfWidgetFormTextarea(),
      'google_map'      => new sfWidgetFormInputText(),
      'observacion'     => new sfWidgetFormTextarea(),
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'       => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'provincia_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'))),
      'ciudad_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'))),
      'ciudad_final_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad2'), 'required' => false)),
      'nombre'          => new sfValidatorString(array('max_length' => 255)),
      'direccion'       => new sfValidatorString(array('required' => false)),
      'google_map'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'observacion'     => new sfValidatorString(array('required' => false)),
      'user_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ubicacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ubicacion';
  }

}
