<?php

/**
 * Canastilla filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCanastillaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'tipo_canastilla_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCanastilla'), 'add_empty' => true)),
      'marca_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Marca'), 'add_empty' => true)),
      'modelo'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_serie'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'observaciones'         => new sfWidgetFormFilterInput(),
      'mantenimiento_proximo' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'mantenimiento_ultimo'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'             => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'tipo_canastilla_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoCanastilla'), 'column' => 'id')),
      'marca_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Marca'), 'column' => 'id')),
      'modelo'                => new sfValidatorPass(array('required' => false)),
      'numero_serie'          => new sfValidatorPass(array('required' => false)),
      'observaciones'         => new sfValidatorPass(array('required' => false)),
      'mantenimiento_proximo' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'mantenimiento_ultimo'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'user_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'             => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('canastilla_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Canastilla';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'empresa_id'            => 'ForeignKey',
      'tipo_canastilla_id'    => 'ForeignKey',
      'marca_id'              => 'ForeignKey',
      'modelo'                => 'Text',
      'numero_serie'          => 'Text',
      'observaciones'         => 'Text',
      'mantenimiento_proximo' => 'Date',
      'mantenimiento_ultimo'  => 'Date',
      'user_id'               => 'ForeignKey',
      'user_name'             => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
