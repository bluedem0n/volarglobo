<?php

/**
 * Cliente filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClienteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'titulo'              => new sfWidgetFormFilterInput(),
      'tipo_cliente_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCliente'), 'add_empty' => true)),
      'pais_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'add_empty' => true)),
      'dni'                 => new sfWidgetFormFilterInput(),
      'nombre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ocupacion'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_nacimiento'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sexo'                => new sfWidgetFormFilterInput(),
      'edo_civil'           => new sfWidgetFormFilterInput(),
      'nacionalidad'        => new sfWidgetFormFilterInput(),
      'direcion'            => new sfWidgetFormFilterInput(),
      'direccion_fisica'    => new sfWidgetFormFilterInput(),
      'telefono_principal'  => new sfWidgetFormFilterInput(),
      'telefono_secundario' => new sfWidgetFormFilterInput(),
      'email'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'website'             => new sfWidgetFormFilterInput(),
      'status'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'peso'                => new sfWidgetFormFilterInput(),
      'observacion'         => new sfWidgetFormFilterInput(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'           => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'empresa_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'titulo'              => new sfValidatorPass(array('required' => false)),
      'tipo_cliente_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoCliente'), 'column' => 'id')),
      'pais_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pais'), 'column' => 'id')),
      'dni'                 => new sfValidatorPass(array('required' => false)),
      'nombre'              => new sfValidatorPass(array('required' => false)),
      'apellido'            => new sfValidatorPass(array('required' => false)),
      'ocupacion'           => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'sexo'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'edo_civil'           => new sfValidatorPass(array('required' => false)),
      'nacionalidad'        => new sfValidatorPass(array('required' => false)),
      'direcion'            => new sfValidatorPass(array('required' => false)),
      'direccion_fisica'    => new sfValidatorPass(array('required' => false)),
      'telefono_principal'  => new sfValidatorPass(array('required' => false)),
      'telefono_secundario' => new sfValidatorPass(array('required' => false)),
      'email'               => new sfValidatorPass(array('required' => false)),
      'website'             => new sfValidatorPass(array('required' => false)),
      'status'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'peso'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'observacion'         => new sfValidatorPass(array('required' => false)),
      'user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'           => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cliente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'empresa_id'          => 'ForeignKey',
      'titulo'              => 'Text',
      'tipo_cliente_id'     => 'ForeignKey',
      'pais_id'             => 'ForeignKey',
      'dni'                 => 'Text',
      'nombre'              => 'Text',
      'apellido'            => 'Text',
      'ocupacion'           => 'Text',
      'fecha_nacimiento'    => 'Date',
      'sexo'                => 'Number',
      'edo_civil'           => 'Text',
      'nacionalidad'        => 'Text',
      'direcion'            => 'Text',
      'direccion_fisica'    => 'Text',
      'telefono_principal'  => 'Text',
      'telefono_secundario' => 'Text',
      'email'               => 'Text',
      'website'             => 'Text',
      'status'              => 'Number',
      'peso'                => 'Number',
      'observacion'         => 'Text',
      'user_id'             => 'ForeignKey',
      'user_name'           => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
