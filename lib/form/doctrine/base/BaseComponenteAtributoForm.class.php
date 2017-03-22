<?php

/**
 * ComponenteAtributo form base class.
 *
 * @method ComponenteAtributo getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseComponenteAtributoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'componente_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Componente'), 'add_empty' => false)),
      'componente_atributo_tipo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ComponenteAtributoTipo'), 'add_empty' => false)),
      'nombre'                      => new sfWidgetFormInputText(),
      'valor'                       => new sfWidgetFormInputText(),
      'created_at'                  => new sfWidgetFormDateTime(),
      'updated_at'                  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'componente_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Componente'))),
      'componente_atributo_tipo_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ComponenteAtributoTipo'))),
      'nombre'                      => new sfValidatorString(array('max_length' => 50)),
      'valor'                       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'created_at'                  => new sfValidatorDateTime(),
      'updated_at'                  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('componente_atributo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComponenteAtributo';
  }

}
