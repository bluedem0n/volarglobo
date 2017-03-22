<?php

/**
 * ExcursionPrecio filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExcursionPrecioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'excursion_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Excursion'), 'add_empty' => true)),
      'precio'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_adulto'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_ninno'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_tercera_edad' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'           => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'excursion_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Excursion'), 'column' => 'id')),
      'precio'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'numero_adulto'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_ninno'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_tercera_edad' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'           => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('excursion_precio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExcursionPrecio';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'empresa_id'          => 'ForeignKey',
      'excursion_id'        => 'ForeignKey',
      'precio'              => 'Number',
      'numero_adulto'       => 'Number',
      'numero_ninno'        => 'Number',
      'numero_tercera_edad' => 'Number',
      'user_id'             => 'ForeignKey',
      'user_name'           => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
