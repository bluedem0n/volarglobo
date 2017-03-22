<?php

/**
 * VueloRestriciones filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVueloRestricionesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'proveedor_vuelo_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorVuelo'), 'add_empty' => true)),
      'tipo_restriciones_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoRestriciones'), 'add_empty' => true)),
      'valor'                => new sfWidgetFormFilterInput(),
      'user_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'            => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'proveedor_vuelo_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProveedorVuelo'), 'column' => 'id')),
      'tipo_restriciones_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoRestriciones'), 'column' => 'id')),
      'valor'                => new sfValidatorPass(array('required' => false)),
      'user_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'            => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('vuelo_restriciones_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VueloRestriciones';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'empresa_id'           => 'ForeignKey',
      'proveedor_vuelo_id'   => 'ForeignKey',
      'tipo_restriciones_id' => 'ForeignKey',
      'valor'                => 'Text',
      'user_id'              => 'ForeignKey',
      'user_name'            => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
