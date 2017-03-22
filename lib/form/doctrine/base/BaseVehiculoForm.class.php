<?php

/**
 * Vehiculo form base class.
 *
 * @method Vehiculo getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVehiculoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'empresa_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'vehiculo_categoria_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoCategoria'), 'add_empty' => false)),
      'vehiculo_marca_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoMarca'), 'add_empty' => false)),
      'vehiculo_marca_modelo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoMarcaModelo'), 'add_empty' => false)),
      'vehiculo_tipo_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoTipo'), 'add_empty' => false)),
      'vehiculo_tipo_transmision_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoTipoTransmision'), 'add_empty' => false)),
      'vehiculo_tipo_reproductor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoTipoReproductor'), 'add_empty' => false)),
      'nombre'                       => new sfWidgetFormInputText(),
      'placa'                        => new sfWidgetFormInputText(),
      'anno'                         => new sfWidgetFormInputText(),
      'user_id'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'                    => new sfWidgetFormInputText(),
      'created_at'                   => new sfWidgetFormDateTime(),
      'updated_at'                   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'vehiculo_categoria_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoCategoria'))),
      'vehiculo_marca_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoMarca'))),
      'vehiculo_marca_modelo_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoMarcaModelo'))),
      'vehiculo_tipo_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoTipo'))),
      'vehiculo_tipo_transmision_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoTipoTransmision'))),
      'vehiculo_tipo_reproductor_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoTipoReproductor'))),
      'nombre'                       => new sfValidatorString(array('max_length' => 100)),
      'placa'                        => new sfValidatorString(array('max_length' => 100)),
      'anno'                         => new sfValidatorInteger(),
      'user_id'                      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'                    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'                   => new sfValidatorDateTime(),
      'updated_at'                   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('vehiculo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehiculo';
  }

}
