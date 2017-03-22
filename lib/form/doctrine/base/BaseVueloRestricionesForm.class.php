<?php

/**
 * VueloRestriciones form base class.
 *
 * @method VueloRestriciones getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVueloRestricionesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'empresa_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'proveedor_vuelo_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorVuelo'), 'add_empty' => false)),
      'tipo_restriciones_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoRestriciones'), 'add_empty' => true)),
      'valor'                => new sfWidgetFormTextarea(),
      'user_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'            => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'proveedor_vuelo_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorVuelo'))),
      'tipo_restriciones_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoRestriciones'), 'required' => false)),
      'valor'                => new sfValidatorString(array('required' => false)),
      'user_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vuelo_restriciones[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VueloRestriciones';
  }

}
