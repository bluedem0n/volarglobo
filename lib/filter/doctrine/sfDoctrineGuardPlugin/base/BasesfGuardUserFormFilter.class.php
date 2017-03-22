<?php

/**
 * sfGuardUser filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'identificacion'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_nacimiento'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'direcion'           => new sfWidgetFormFilterInput(),
      'telefono_principal' => new sfWidgetFormFilterInput(),
      'sexo'               => new sfWidgetFormFilterInput(),
      'tipo_personal_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoPersonal'), 'add_empty' => true)),
      'edo_civil'          => new sfWidgetFormFilterInput(),
      'nacionalidad'       => new sfWidgetFormFilterInput(),
      'empresa_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
      'ocupacion'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'titulo'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'grado_instruccion'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email_address'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'           => new sfWidgetFormFilterInput(),
      'algorithm'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'salt'               => new sfWidgetFormFilterInput(),
      'password'           => new sfWidgetFormFilterInput(),
      'is_active'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_super_admin'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'last_login'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'alerta'             => new sfWidgetFormFilterInput(),
      'observacion'        => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'groups_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup')),
      'permissions_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
    ));

    $this->setValidators(array(
      'first_name'         => new sfValidatorPass(array('required' => false)),
      'last_name'          => new sfValidatorPass(array('required' => false)),
      'identificacion'     => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'direcion'           => new sfValidatorPass(array('required' => false)),
      'telefono_principal' => new sfValidatorPass(array('required' => false)),
      'sexo'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tipo_personal_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoPersonal'), 'column' => 'id')),
      'edo_civil'          => new sfValidatorPass(array('required' => false)),
      'nacionalidad'       => new sfValidatorPass(array('required' => false)),
      'empresa_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
      'ocupacion'          => new sfValidatorPass(array('required' => false)),
      'titulo'             => new sfValidatorPass(array('required' => false)),
      'grado_instruccion'  => new sfValidatorPass(array('required' => false)),
      'email_address'      => new sfValidatorPass(array('required' => false)),
      'username'           => new sfValidatorPass(array('required' => false)),
      'algorithm'          => new sfValidatorPass(array('required' => false)),
      'salt'               => new sfValidatorPass(array('required' => false)),
      'password'           => new sfValidatorPass(array('required' => false)),
      'is_active'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_super_admin'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'last_login'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'alerta'             => new sfValidatorPass(array('required' => false)),
      'observacion'        => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'groups_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup', 'required' => false)),
      'permissions_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addGroupsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.sfGuardUserGroup sfGuardUserGroup')
      ->andWhereIn('sfGuardUserGroup.group_id', $values)
    ;
  }

  public function addPermissionsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.sfGuardUserPermission sfGuardUserPermission')
      ->andWhereIn('sfGuardUserPermission.permission_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'sfGuardUser';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'first_name'         => 'Text',
      'last_name'          => 'Text',
      'identificacion'     => 'Text',
      'fecha_nacimiento'   => 'Date',
      'direcion'           => 'Text',
      'telefono_principal' => 'Text',
      'sexo'               => 'Number',
      'tipo_personal_id'   => 'ForeignKey',
      'edo_civil'          => 'Text',
      'nacionalidad'       => 'Text',
      'empresa_id'         => 'ForeignKey',
      'ocupacion'          => 'Text',
      'titulo'             => 'Text',
      'grado_instruccion'  => 'Text',
      'email_address'      => 'Text',
      'username'           => 'Text',
      'algorithm'          => 'Text',
      'salt'               => 'Text',
      'password'           => 'Text',
      'is_active'          => 'Boolean',
      'is_super_admin'     => 'Boolean',
      'last_login'         => 'Date',
      'alerta'             => 'Text',
      'observacion'        => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'groups_list'        => 'ManyKey',
      'permissions_list'   => 'ManyKey',
    );
  }
}
