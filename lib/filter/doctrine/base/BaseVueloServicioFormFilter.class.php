<?php

/**
 * VueloServicio filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVueloServicioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'proveedor_vuelo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorVuelo'), 'add_empty' => true)),
      'proveedor_descuento_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorDescuento'), 'add_empty' => true)),
      'cantidad'               => new sfWidgetFormFilterInput(),
      'valor'                  => new sfWidgetFormFilterInput(),
      'user_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'              => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'proveedor_vuelo_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProveedorVuelo'), 'column' => 'id')),
      'proveedor_descuento_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProveedorDescuento'), 'column' => 'id')),
      'cantidad'               => new sfValidatorPass(array('required' => false)),
      'valor'                  => new sfValidatorPass(array('required' => false)),
      'user_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'              => new sfValidatorPass(array('required' => false)),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('vuelo_servicio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VueloServicio';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'empresa_id'             => 'ForeignKey',
      'proveedor_vuelo_id'     => 'ForeignKey',
      'proveedor_descuento_id' => 'ForeignKey',
      'cantidad'               => 'Text',
      'valor'                  => 'Text',
      'user_id'                => 'ForeignKey',
      'user_name'              => 'Text',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
    );
  }
}
