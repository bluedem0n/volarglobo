<?php

/**
 * HospedajeHabitacion filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHospedajeHabitacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'hospedaje_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hospedaje'), 'add_empty' => true)),
      'tipo_habitacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoHabitacion'), 'add_empty' => true)),
      'tipo_cama'          => new sfWidgetFormFilterInput(),
      'cantidad_personas'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'             => new sfWidgetFormFilterInput(),
      'precio'             => new sfWidgetFormFilterInput(),
      'foto'               => new sfWidgetFormFilterInput(),
      'user_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'          => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'hospedaje_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Hospedaje'), 'column' => 'id')),
      'tipo_habitacion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoHabitacion'), 'column' => 'id')),
      'tipo_cama'          => new sfValidatorPass(array('required' => false)),
      'cantidad_personas'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'precio'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'foto'               => new sfValidatorPass(array('required' => false)),
      'user_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'          => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('hospedaje_habitacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HospedajeHabitacion';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'empresa_id'         => 'ForeignKey',
      'hospedaje_id'       => 'ForeignKey',
      'tipo_habitacion_id' => 'ForeignKey',
      'tipo_cama'          => 'Text',
      'cantidad_personas'  => 'Number',
      'nombre'             => 'Text',
      'precio'             => 'Number',
      'foto'               => 'Text',
      'user_id'            => 'ForeignKey',
      'user_name'          => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
