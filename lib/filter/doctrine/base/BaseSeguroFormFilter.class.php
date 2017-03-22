<?php

/**
 * Seguro filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSeguroFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'seguro_tipo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SeguroTipo'), 'add_empty' => true)),
      'seguro_plan_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SeguroPlan'), 'add_empty' => true)),
      'nombre'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dia'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'    => new sfWidgetFormFilterInput(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'      => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'seguro_tipo_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SeguroTipo'), 'column' => 'id')),
      'seguro_plan_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SeguroPlan'), 'column' => 'id')),
      'nombre'         => new sfValidatorPass(array('required' => false)),
      'dia'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descripcion'    => new sfValidatorPass(array('required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'      => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('seguro_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Seguro';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'empresa_id'     => 'ForeignKey',
      'seguro_tipo_id' => 'ForeignKey',
      'seguro_plan_id' => 'ForeignKey',
      'nombre'         => 'Text',
      'dia'            => 'Number',
      'descripcion'    => 'Text',
      'user_id'        => 'ForeignKey',
      'user_name'      => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
