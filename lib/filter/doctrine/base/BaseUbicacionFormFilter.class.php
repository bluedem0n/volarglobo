<?php

/**
 * Ubicacion filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUbicacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'ciudad_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => true)),
      'ciudad_final_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad2'), 'add_empty' => true)),
      'nombre'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion'       => new sfWidgetFormFilterInput(),
      'google_map'      => new sfWidgetFormFilterInput(),
      'observacion'     => new sfWidgetFormFilterInput(),
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'       => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'ciudad_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ciudad'), 'column' => 'id')),
      'ciudad_final_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ciudad2'), 'column' => 'id')),
      'nombre'          => new sfValidatorPass(array('required' => false)),
      'direccion'       => new sfValidatorPass(array('required' => false)),
      'google_map'      => new sfValidatorPass(array('required' => false)),
      'observacion'     => new sfValidatorPass(array('required' => false)),
      'user_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'       => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ubicacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ubicacion';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'empresa_id'      => 'ForeignKey',
      'ciudad_id'       => 'ForeignKey',
      'ciudad_final_id' => 'ForeignKey',
      'nombre'          => 'Text',
      'direccion'       => 'Text',
      'google_map'      => 'Text',
      'observacion'     => 'Text',
      'user_id'         => 'ForeignKey',
      'user_name'       => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
