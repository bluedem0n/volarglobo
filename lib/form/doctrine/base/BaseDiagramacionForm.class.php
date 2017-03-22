<?php

/**
 * Diagramacion form base class.
 *
 * @method Diagramacion getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDiagramacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'modulo_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Modulo'), 'add_empty' => false)),
      'distribucion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Distribucion'), 'add_empty' => false)),
      'columna'         => new sfWidgetFormInputText(),
      'orden'           => new sfWidgetFormInputText(),
      'is_static'       => new sfWidgetFormInputText(),
      'is_remove'       => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'modulo_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Modulo'))),
      'distribucion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Distribucion'))),
      'columna'         => new sfValidatorString(array('max_length' => 50)),
      'orden'           => new sfValidatorInteger(),
      'is_static'       => new sfValidatorInteger(),
      'is_remove'       => new sfValidatorInteger(),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('diagramacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Diagramacion';
  }

}
