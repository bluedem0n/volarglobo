<?php

/**
 * Proveedor filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProveedorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'provincia_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'), 'add_empty' => true)),
      'ciudad_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => true)),
      'categoria_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'rif'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dni'               => new sfWidgetFormFilterInput(),
      'nombre'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nickname'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion_fiscal'  => new sfWidgetFormFilterInput(),
      'direccion_fisica'  => new sfWidgetFormFilterInput(),
      'horario'           => new sfWidgetFormFilterInput(),
      'telefono1'         => new sfWidgetFormFilterInput(),
      'telefono2'         => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'website'           => new sfWidgetFormFilterInput(),
      'contacto_nombre'   => new sfWidgetFormFilterInput(),
      'contacto_puesto'   => new sfWidgetFormFilterInput(),
      'contacto_telefono' => new sfWidgetFormFilterInput(),
      'status'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'       => new sfWidgetFormFilterInput(),
      'observacion'       => new sfWidgetFormFilterInput(),
      'logo'              => new sfWidgetFormFilterInput(),
      'video'             => new sfWidgetFormFilterInput(),
      'redes_sociales'    => new sfWidgetFormFilterInput(),
      'palabras_claves'   => new sfWidgetFormFilterInput(),
      'destacado'         => new sfWidgetFormFilterInput(),
      'click'             => new sfWidgetFormFilterInput(),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'         => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'provincia_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Provincia'), 'column' => 'id')),
      'ciudad_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ciudad'), 'column' => 'id')),
      'categoria_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categoria'), 'column' => 'id')),
      'rif'               => new sfValidatorPass(array('required' => false)),
      'dni'               => new sfValidatorPass(array('required' => false)),
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'nickname'          => new sfValidatorPass(array('required' => false)),
      'direccion_fiscal'  => new sfValidatorPass(array('required' => false)),
      'direccion_fisica'  => new sfValidatorPass(array('required' => false)),
      'horario'           => new sfValidatorPass(array('required' => false)),
      'telefono1'         => new sfValidatorPass(array('required' => false)),
      'telefono2'         => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'website'           => new sfValidatorPass(array('required' => false)),
      'contacto_nombre'   => new sfValidatorPass(array('required' => false)),
      'contacto_puesto'   => new sfValidatorPass(array('required' => false)),
      'contacto_telefono' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'descripcion'       => new sfValidatorPass(array('required' => false)),
      'observacion'       => new sfValidatorPass(array('required' => false)),
      'logo'              => new sfValidatorPass(array('required' => false)),
      'video'             => new sfValidatorPass(array('required' => false)),
      'redes_sociales'    => new sfValidatorPass(array('required' => false)),
      'palabras_claves'   => new sfValidatorPass(array('required' => false)),
      'destacado'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'click'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'         => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('proveedor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proveedor';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'empresa_id'        => 'ForeignKey',
      'provincia_id'      => 'ForeignKey',
      'ciudad_id'         => 'ForeignKey',
      'categoria_id'      => 'ForeignKey',
      'rif'               => 'Text',
      'dni'               => 'Text',
      'nombre'            => 'Text',
      'nickname'          => 'Text',
      'direccion_fiscal'  => 'Text',
      'direccion_fisica'  => 'Text',
      'horario'           => 'Text',
      'telefono1'         => 'Text',
      'telefono2'         => 'Text',
      'email'             => 'Text',
      'website'           => 'Text',
      'contacto_nombre'   => 'Text',
      'contacto_puesto'   => 'Text',
      'contacto_telefono' => 'Number',
      'status'            => 'Number',
      'descripcion'       => 'Text',
      'observacion'       => 'Text',
      'logo'              => 'Text',
      'video'             => 'Text',
      'redes_sociales'    => 'Text',
      'palabras_claves'   => 'Text',
      'destacado'         => 'Number',
      'click'             => 'Number',
      'user_id'           => 'ForeignKey',
      'user_name'         => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'slug'              => 'Text',
    );
  }
}
