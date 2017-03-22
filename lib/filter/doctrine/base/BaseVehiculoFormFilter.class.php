<?php

/**
 * Vehiculo filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVehiculoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'vehiculo_categoria_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoCategoria'), 'add_empty' => true)),
      'vehiculo_marca_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoMarca'), 'add_empty' => true)),
      'vehiculo_marca_modelo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoMarcaModelo'), 'add_empty' => true)),
      'vehiculo_tipo_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoTipo'), 'add_empty' => true)),
      'vehiculo_tipo_transmision_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoTipoTransmision'), 'add_empty' => true)),
      'vehiculo_tipo_reproductor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('VehiculoTipoReproductor'), 'add_empty' => true)),
      'nombre'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'placa'                        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'anno'                         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'                    => new sfWidgetFormFilterInput(),
      'created_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'vehiculo_categoria_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculoCategoria'), 'column' => 'id')),
      'vehiculo_marca_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculoMarca'), 'column' => 'id')),
      'vehiculo_marca_modelo_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculoMarcaModelo'), 'column' => 'id')),
      'vehiculo_tipo_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculoTipo'), 'column' => 'id')),
      'vehiculo_tipo_transmision_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculoTipoTransmision'), 'column' => 'id')),
      'vehiculo_tipo_reproductor_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('VehiculoTipoReproductor'), 'column' => 'id')),
      'nombre'                       => new sfValidatorPass(array('required' => false)),
      'placa'                        => new sfValidatorPass(array('required' => false)),
      'anno'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'                      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'                    => new sfValidatorPass(array('required' => false)),
      'created_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('vehiculo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehiculo';
  }

  public function getFields()
  {
    return array(
      'id'                           => 'Number',
      'empresa_id'                   => 'ForeignKey',
      'vehiculo_categoria_id'        => 'ForeignKey',
      'vehiculo_marca_id'            => 'ForeignKey',
      'vehiculo_marca_modelo_id'     => 'ForeignKey',
      'vehiculo_tipo_id'             => 'ForeignKey',
      'vehiculo_tipo_transmision_id' => 'ForeignKey',
      'vehiculo_tipo_reproductor_id' => 'ForeignKey',
      'nombre'                       => 'Text',
      'placa'                        => 'Text',
      'anno'                         => 'Number',
      'user_id'                      => 'ForeignKey',
      'user_name'                    => 'Text',
      'created_at'                   => 'Date',
      'updated_at'                   => 'Date',
    );
  }
}
