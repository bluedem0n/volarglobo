<?php

/**
 * Marca form base class.
 *
 * @method Marca getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMarcaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'empresa_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'nombre'            => new sfWidgetFormInputText(),
      'descripcion_breve' => new sfWidgetFormInputText(),
      'status'            => new sfWidgetFormInputText(),
      'keywords'          => new sfWidgetFormInputText(),
      'imagen'            => new sfWidgetFormInputText(),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'         => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'slug'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'))),
      'nombre'            => new sfValidatorString(array('max_length' => 100)),
      'descripcion_breve' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'            => new sfValidatorInteger(),
      'keywords'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'imagen'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'slug'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Marca', 'column' => array('slug', 'nombre')))
    );

    $this->widgetSchema->setNameFormat('marca[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Marca';
  }

}
