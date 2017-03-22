<?php

/**
 * ExcursionPrecio form base class.
 *
 * @method ExcursionPrecio getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExcursionPrecioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'empresa_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'excursion_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Excursion'), 'add_empty' => false)),
      'precio'              => new sfWidgetFormInputText(),
      'numero_adulto'       => new sfWidgetFormInputText(),
      'numero_ninno'        => new sfWidgetFormInputText(),
      'numero_tercera_edad' => new sfWidgetFormInputText(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'           => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'excursion_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Excursion'))),
      'precio'              => new sfValidatorNumber(),
      'numero_adulto'       => new sfValidatorInteger(),
      'numero_ninno'        => new sfValidatorInteger(),
      'numero_tercera_edad' => new sfValidatorInteger(),
      'user_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('excursion_precio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExcursionPrecio';
  }

}
