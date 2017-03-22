<?php

/**
 * CiudadFinal filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCiudadFinalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'provincia_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'), 'add_empty' => true)),
      'provincia_final_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia2'), 'add_empty' => true)),
      'codigo'             => new sfWidgetFormFilterInput(),
      'nombre'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'observacion'        => new sfWidgetFormFilterInput(),
      'user_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'          => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'provincia_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Provincia'), 'column' => 'id')),
      'provincia_final_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Provincia2'), 'column' => 'id')),
      'codigo'             => new sfValidatorPass(array('required' => false)),
      'nombre'             => new sfValidatorPass(array('required' => false)),
      'status'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'observacion'        => new sfValidatorPass(array('required' => false)),
      'user_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'          => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ciudad_final_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CiudadFinal';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'empresa_id'         => 'Number',
      'provincia_id'       => 'ForeignKey',
      'provincia_final_id' => 'ForeignKey',
      'codigo'             => 'Text',
      'nombre'             => 'Text',
      'status'             => 'Number',
      'observacion'        => 'Text',
      'user_id'            => 'ForeignKey',
      'user_name'          => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
