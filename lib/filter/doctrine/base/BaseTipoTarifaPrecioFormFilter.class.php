<?php

/**
 * TipoTarifaPrecio filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTipoTarifaPrecioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'tipo_tarifa_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoTarifa'), 'add_empty' => true)),
      'rango_edad_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RangoEdad'), 'add_empty' => true)),
      'precio'         => new sfWidgetFormFilterInput(),
      'user_id'        => new sfWidgetFormFilterInput(),
      'user_name'      => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'tipo_tarifa_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoTarifa'), 'column' => 'id')),
      'rango_edad_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('RangoEdad'), 'column' => 'id')),
      'precio'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'user_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_name'      => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('tipo_tarifa_precio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoTarifaPrecio';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'empresa_id'     => 'ForeignKey',
      'tipo_tarifa_id' => 'ForeignKey',
      'rango_edad_id'  => 'ForeignKey',
      'precio'         => 'Number',
      'user_id'        => 'Number',
      'user_name'      => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
