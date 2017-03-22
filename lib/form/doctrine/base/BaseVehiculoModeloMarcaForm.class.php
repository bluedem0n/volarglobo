<?php

/**
 * VehiculoModeloMarca form base class.
 *
 * @method VehiculoModeloMarca getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVehiculoModeloMarcaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'empresa_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'vehiculo_marca_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoMarca'), 'add_empty' => false)),
      'nombre'            => new sfWidgetFormInputText(),
      'descripcion'       => new sfWidgetFormTextarea(),
      'status'            => new sfWidgetFormInputText(),
      'cantidad_puerta'   => new sfWidgetFormInputText(),
      'capacidad_maleta'  => new sfWidgetFormInputText(),
      'capacidad_persona' => new sfWidgetFormInputText(),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'         => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'))),
      'vehiculo_marca_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoMarca'))),
      'nombre'            => new sfValidatorString(array('max_length' => 100)),
      'descripcion'       => new sfValidatorString(array('required' => false)),
      'status'            => new sfValidatorInteger(array('required' => false)),
      'cantidad_puerta'   => new sfValidatorInteger(array('required' => false)),
      'capacidad_maleta'  => new sfValidatorInteger(array('required' => false)),
      'capacidad_persona' => new sfValidatorInteger(),
      'user_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vehiculo_modelo_marca[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VehiculoModeloMarca';
  }

}
