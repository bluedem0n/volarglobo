<?php

/**
 * ProveedorDescuento filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProveedorDescuentoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'tipo'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'categoria_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'proveedor_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'add_empty' => true)),
      'nombre'                => new sfWidgetFormFilterInput(),
      'proveedor_sucursal_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorSucursal'), 'add_empty' => true)),
      'observacion'           => new sfWidgetFormFilterInput(),
      'condiciones'           => new sfWidgetFormFilterInput(),
      'fecha_limite'          => new sfWidgetFormFilterInput(),
      'fecha_activacion'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_finalizacion'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'num_descuentos'        => new sfWidgetFormFilterInput(),
      'comportamiento'        => new sfWidgetFormFilterInput(),
      'aplicacion'            => new sfWidgetFormFilterInput(),
      'precio'                => new sfWidgetFormFilterInput(),
      'precio_oferta'         => new sfWidgetFormFilterInput(),
      'destacado'             => new sfWidgetFormFilterInput(),
      'click'                 => new sfWidgetFormFilterInput(),
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'             => new sfWidgetFormFilterInput(),
      'imagen_uno'            => new sfWidgetFormFilterInput(),
      'imagen_dos'            => new sfWidgetFormFilterInput(),
      'imagen_tres'           => new sfWidgetFormFilterInput(),
      'imagen_cuatro'         => new sfWidgetFormFilterInput(),
      'imagen_cinco'          => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'                  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'tipo'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'categoria_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categoria'), 'column' => 'id')),
      'proveedor_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Proveedor'), 'column' => 'id')),
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'proveedor_sucursal_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProveedorSucursal'), 'column' => 'id')),
      'observacion'           => new sfValidatorPass(array('required' => false)),
      'condiciones'           => new sfValidatorPass(array('required' => false)),
      'fecha_limite'          => new sfValidatorPass(array('required' => false)),
      'fecha_activacion'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fecha_finalizacion'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'num_descuentos'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comportamiento'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'aplicacion'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'precio_oferta'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'destacado'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'click'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'             => new sfValidatorPass(array('required' => false)),
      'imagen_uno'            => new sfValidatorPass(array('required' => false)),
      'imagen_dos'            => new sfValidatorPass(array('required' => false)),
      'imagen_tres'           => new sfValidatorPass(array('required' => false)),
      'imagen_cuatro'         => new sfValidatorPass(array('required' => false)),
      'imagen_cinco'          => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'                  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proveedor_descuento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProveedorDescuento';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'empresa_id'            => 'ForeignKey',
      'tipo'                  => 'Number',
      'status'                => 'Number',
      'categoria_id'          => 'ForeignKey',
      'proveedor_id'          => 'ForeignKey',
      'nombre'                => 'Text',
      'proveedor_sucursal_id' => 'ForeignKey',
      'observacion'           => 'Text',
      'condiciones'           => 'Text',
      'fecha_limite'          => 'Text',
      'fecha_activacion'      => 'Date',
      'fecha_finalizacion'    => 'Date',
      'num_descuentos'        => 'Number',
      'comportamiento'        => 'Number',
      'aplicacion'            => 'Number',
      'precio'                => 'Number',
      'precio_oferta'         => 'Number',
      'destacado'             => 'Number',
      'click'                 => 'Number',
      'user_id'               => 'ForeignKey',
      'user_name'             => 'Text',
      'imagen_uno'            => 'Text',
      'imagen_dos'            => 'Text',
      'imagen_tres'           => 'Text',
      'imagen_cuatro'         => 'Text',
      'imagen_cinco'          => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'slug'                  => 'Text',
    );
  }
}
