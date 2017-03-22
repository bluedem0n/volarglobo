<?php

/**
 * ProveedorVuelo filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProveedorVueloFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'codigo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'globo_id'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_vuelo_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoVuelo'), 'add_empty' => true)),
      'tipo_tarifa_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoTarifa'), 'add_empty' => true)),
      'tipo_motivo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoMotivo'), 'add_empty' => true)),
      'tipo_lona_id'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'horario'            => new sfWidgetFormFilterInput(),
      'observacion'        => new sfWidgetFormFilterInput(),
      'condiciones'        => new sfWidgetFormFilterInput(),
      'fecha_limite'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_activacion'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_finalizacion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'precio'             => new sfWidgetFormFilterInput(),
      'precio_oferta'      => new sfWidgetFormFilterInput(),
      'user_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'          => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'codigo'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'globo_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tipo_vuelo_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoVuelo'), 'column' => 'id')),
      'tipo_tarifa_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoTarifa'), 'column' => 'id')),
      'tipo_motivo_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoMotivo'), 'column' => 'id')),
      'tipo_lona_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'horario'            => new sfValidatorPass(array('required' => false)),
      'observacion'        => new sfValidatorPass(array('required' => false)),
      'condiciones'        => new sfValidatorPass(array('required' => false)),
      'fecha_limite'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_activacion'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_finalizacion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'precio'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'precio_oferta'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'user_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'          => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('proveedor_vuelo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProveedorVuelo';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'empresa_id'         => 'ForeignKey',
      'codigo'             => 'Number',
      'globo_id'           => 'Number',
      'tipo_vuelo_id'      => 'ForeignKey',
      'tipo_tarifa_id'     => 'ForeignKey',
      'tipo_motivo_id'     => 'ForeignKey',
      'tipo_lona_id'       => 'Number',
      'status'             => 'Number',
      'horario'            => 'Text',
      'observacion'        => 'Text',
      'condiciones'        => 'Text',
      'fecha_limite'       => 'Date',
      'fecha_activacion'   => 'Date',
      'fecha_finalizacion' => 'Date',
      'precio'             => 'Number',
      'precio_oferta'      => 'Number',
      'user_id'            => 'ForeignKey',
      'user_name'          => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
