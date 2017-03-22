<?php

/**
 * Globo filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGloboFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'ubicacion_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => true)),
      'marca_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Marca'), 'add_empty' => true)),
      'canastilla_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Canastilla'), 'add_empty' => true)),
      'quemador_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quemador'), 'add_empty' => true)),
      'modelo'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_serie'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'peso_limite'           => new sfWidgetFormFilterInput(),
      'peso_max_vacio'        => new sfWidgetFormFilterInput(),
      'peso_max_pasajeros'    => new sfWidgetFormFilterInput(),
      'combustible'           => new sfWidgetFormFilterInput(),
      'tamano'                => new sfWidgetFormFilterInput(),
      'cantidad_tanques'      => new sfWidgetFormFilterInput(),
      'capacidad'             => new sfWidgetFormFilterInput(),
      'certificado'           => new sfWidgetFormFilterInput(),
      'descripcion'           => new sfWidgetFormFilterInput(),
      'observacion'           => new sfWidgetFormFilterInput(),
      'orden'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'imagen'                => new sfWidgetFormFilterInput(),
      'status'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mantenimiento_proximo' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'mantenimiento_ultimo'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'user_id'               => new sfWidgetFormFilterInput(),
      'user_name'             => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'ubicacion_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ubicacion'), 'column' => 'id')),
      'marca_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Marca'), 'column' => 'id')),
      'canastilla_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Canastilla'), 'column' => 'id')),
      'quemador_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Quemador'), 'column' => 'id')),
      'modelo'                => new sfValidatorPass(array('required' => false)),
      'numero_serie'          => new sfValidatorPass(array('required' => false)),
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'peso_limite'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'peso_max_vacio'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'peso_max_pasajeros'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'combustible'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'tamano'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_tanques'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'capacidad'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'certificado'           => new sfValidatorPass(array('required' => false)),
      'descripcion'           => new sfValidatorPass(array('required' => false)),
      'observacion'           => new sfValidatorPass(array('required' => false)),
      'orden'                 => new sfValidatorPass(array('required' => false)),
      'imagen'                => new sfValidatorPass(array('required' => false)),
      'status'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mantenimiento_proximo' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'mantenimiento_ultimo'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'user_id'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_name'             => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('globo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Globo';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'empresa_id'            => 'ForeignKey',
      'ubicacion_id'          => 'ForeignKey',
      'marca_id'              => 'ForeignKey',
      'canastilla_id'         => 'ForeignKey',
      'quemador_id'           => 'ForeignKey',
      'modelo'                => 'Text',
      'numero_serie'          => 'Text',
      'nombre'                => 'Text',
      'peso_limite'           => 'Number',
      'peso_max_vacio'        => 'Number',
      'peso_max_pasajeros'    => 'Number',
      'combustible'           => 'Number',
      'tamano'                => 'Number',
      'cantidad_tanques'      => 'Number',
      'capacidad'             => 'Number',
      'certificado'           => 'Text',
      'descripcion'           => 'Text',
      'observacion'           => 'Text',
      'orden'                 => 'Text',
      'imagen'                => 'Text',
      'status'                => 'Number',
      'mantenimiento_proximo' => 'Date',
      'mantenimiento_ultimo'  => 'Date',
      'user_id'               => 'Number',
      'user_name'             => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
