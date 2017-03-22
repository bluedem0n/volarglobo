<?php

/**
 * Canastilla form base class.
 *
 * @method Canastilla getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCanastillaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'empresa_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'tipo_canastilla_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCanastilla'), 'add_empty' => false)),
      'marca_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Marca'), 'add_empty' => false)),
      'modelo'                => new sfWidgetFormInputText(),
      'numero_serie'          => new sfWidgetFormInputText(),
      'observaciones'         => new sfWidgetFormTextarea(),
      'mantenimiento_proximo' => new sfWidgetFormDate(),
      'mantenimiento_ultimo'  => new sfWidgetFormDate(),
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'             => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'tipo_canastilla_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCanastilla'))),
      'marca_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Marca'))),
      'modelo'                => new sfValidatorString(array('max_length' => 100)),
      'numero_serie'          => new sfValidatorString(array('max_length' => 100)),
      'observaciones'         => new sfValidatorString(array('required' => false)),
      'mantenimiento_proximo' => new sfValidatorDate(),
      'mantenimiento_ultimo'  => new sfValidatorDate(),
      'user_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('canastilla[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Canastilla';
  }

}
