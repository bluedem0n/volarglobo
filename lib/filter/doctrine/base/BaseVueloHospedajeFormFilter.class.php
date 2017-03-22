<?php

/**
 * VueloHospedaje filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVueloHospedajeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'proveedor_vuelo_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorVuelo'), 'add_empty' => true)),
      'hospedaje_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hospedaje'), 'add_empty' => true)),
      'hospedaje_habitacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HospedajeHabitacion'), 'add_empty' => true)),
      'cantidad'                => new sfWidgetFormFilterInput(),
      'cantidad_personas'       => new sfWidgetFormFilterInput(),
      'check_in'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'check_out'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'precio'                  => new sfWidgetFormFilterInput(),
      'user_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'               => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'proveedor_vuelo_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProveedorVuelo'), 'column' => 'id')),
      'hospedaje_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Hospedaje'), 'column' => 'id')),
      'hospedaje_habitacion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('HospedajeHabitacion'), 'column' => 'id')),
      'cantidad'                => new sfValidatorPass(array('required' => false)),
      'cantidad_personas'       => new sfValidatorPass(array('required' => false)),
      'check_in'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'check_out'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'precio'                  => new sfValidatorPass(array('required' => false)),
      'user_id'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'               => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('vuelo_hospedaje_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VueloHospedaje';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'empresa_id'              => 'ForeignKey',
      'proveedor_vuelo_id'      => 'ForeignKey',
      'hospedaje_id'            => 'ForeignKey',
      'hospedaje_habitacion_id' => 'ForeignKey',
      'cantidad'                => 'Text',
      'cantidad_personas'       => 'Text',
      'check_in'                => 'Date',
      'check_out'               => 'Date',
      'precio'                  => 'Text',
      'user_id'                 => 'ForeignKey',
      'user_name'               => 'Text',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
