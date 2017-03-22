<?php

/**
 * CiudadFinal form base class.
 *
 * @method CiudadFinal getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCiudadFinalForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'empresa_id'         => new sfWidgetFormInputText(),
      'provincia_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'), 'add_empty' => false)),
      'provincia_final_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia2'), 'add_empty' => true)),
      'codigo'             => new sfWidgetFormInputText(),
      'nombre'             => new sfWidgetFormInputText(),
      'status'             => new sfWidgetFormInputText(),
      'observacion'        => new sfWidgetFormTextarea(),
      'user_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'          => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'         => new sfValidatorInteger(array('required' => false)),
      'provincia_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'))),
      'provincia_final_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia2'), 'required' => false)),
      'codigo'             => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'nombre'             => new sfValidatorString(array('max_length' => 100)),
      'status'             => new sfValidatorInteger(),
      'observacion'        => new sfValidatorString(array('required' => false)),
      'user_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ciudad_final[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CiudadFinal';
  }

}
