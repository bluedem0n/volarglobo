<?php

/**
 * ServicioBitacora filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseServicioBitacoraFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'agendado_bitacora_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AgendadoBitacora'), 'add_empty' => true)),
      'servicio_tipo_id'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'categoria_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'producto_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Producto'), 'add_empty' => true)),
      'servicio_status_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ServicioStatus'), 'add_empty' => true)),
      'tamano_id'            => new sfWidgetFormFilterInput(),
      'presentacion_id'      => new sfWidgetFormFilterInput(),
      'codigo'               => new sfWidgetFormFilterInput(),
      'cantidad'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nota'                 => new sfWidgetFormFilterInput(),
      'precio'               => new sfWidgetFormFilterInput(),
      'impuestos'            => new sfWidgetFormFilterInput(),
      'puntos'               => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'agendado_bitacora_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AgendadoBitacora'), 'column' => 'id')),
      'servicio_tipo_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'categoria_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'producto_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Producto'), 'column' => 'id')),
      'servicio_status_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ServicioStatus'), 'column' => 'id')),
      'tamano_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'presentacion_id'      => new sfValidatorPass(array('required' => false)),
      'codigo'               => new sfValidatorPass(array('required' => false)),
      'cantidad'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nota'                 => new sfValidatorPass(array('required' => false)),
      'precio'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'impuestos'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'puntos'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('servicio_bitacora_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ServicioBitacora';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'agendado_bitacora_id' => 'ForeignKey',
      'servicio_tipo_id'     => 'Number',
      'categoria_id'         => 'Number',
      'producto_id'          => 'ForeignKey',
      'servicio_status_id'   => 'ForeignKey',
      'tamano_id'            => 'Number',
      'presentacion_id'      => 'Text',
      'codigo'               => 'Text',
      'cantidad'             => 'Number',
      'nota'                 => 'Text',
      'precio'               => 'Number',
      'impuestos'            => 'Number',
      'puntos'               => 'Number',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
