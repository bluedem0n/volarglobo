<?php

/**
 * Categoria filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'empresa_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'tipo_id'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'padre'             => new sfWidgetFormFilterInput(),
      'orden'             => new sfWidgetFormFilterInput(),
      'nombre'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mancheta'          => new sfWidgetFormFilterInput(),
      'descripcion_breve' => new sfWidgetFormFilterInput(),
      'status'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'keywords'          => new sfWidgetFormFilterInput(),
      'imagen'            => new sfWidgetFormFilterInput(),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'         => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'empresa_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'tipo_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'padre'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'orden'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'mancheta'          => new sfValidatorPass(array('required' => false)),
      'descripcion_breve' => new sfValidatorPass(array('required' => false)),
      'status'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'keywords'          => new sfValidatorPass(array('required' => false)),
      'imagen'            => new sfValidatorPass(array('required' => false)),
      'user_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_name'         => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('categoria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categoria';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'empresa_id'        => 'ForeignKey',
      'tipo_id'           => 'Number',
      'padre'             => 'Number',
      'orden'             => 'Number',
      'nombre'            => 'Text',
      'mancheta'          => 'Text',
      'descripcion_breve' => 'Text',
      'status'            => 'Number',
      'keywords'          => 'Text',
      'imagen'            => 'Text',
      'user_id'           => 'ForeignKey',
      'user_name'         => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'slug'              => 'Text',
    );
  }
}
