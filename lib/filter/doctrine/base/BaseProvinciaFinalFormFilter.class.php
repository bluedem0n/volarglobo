<?php

/**
 * ProvinciaFinal filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProvinciaFinalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'codigo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'imagen'      => new sfWidgetFormFilterInput(),
      'status'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'observacion' => new sfWidgetFormFilterInput(),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'   => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo'      => new sfValidatorPass(array('required' => false)),
      'nombre'      => new sfValidatorPass(array('required' => false)),
      'imagen'      => new sfValidatorPass(array('required' => false)),
      'status'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'observacion' => new sfValidatorPass(array('required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'   => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('provincia_final_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProvinciaFinal';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'empresa_id'  => 'Number',
      'codigo'      => 'Text',
      'nombre'      => 'Text',
      'imagen'      => 'Text',
      'status'      => 'Number',
      'observacion' => 'Text',
      'user_id'     => 'ForeignKey',
      'user_name'   => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
