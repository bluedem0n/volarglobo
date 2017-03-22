<?php

/**
 * Cliente form base class.
 *
 * @method Cliente getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'empresa_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'titulo'              => new sfWidgetFormInputText(),
      'tipo_cliente_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCliente'), 'add_empty' => true)),
      'pais_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'add_empty' => true)),
      'dni'                 => new sfWidgetFormInputText(),
      'nombre'              => new sfWidgetFormInputText(),
      'apellido'            => new sfWidgetFormInputText(),
      'ocupacion'           => new sfWidgetFormInputText(),
      'fecha_nacimiento'    => new sfWidgetFormDate(),
      'sexo'                => new sfWidgetFormInputText(),
      'edo_civil'           => new sfWidgetFormInputText(),
      'nacionalidad'        => new sfWidgetFormInputText(),
      'direcion'            => new sfWidgetFormTextarea(),
      'direccion_fisica'    => new sfWidgetFormInputText(),
      'telefono_principal'  => new sfWidgetFormInputText(),
      'telefono_secundario' => new sfWidgetFormInputText(),
      'email'               => new sfWidgetFormInputText(),
      'website'             => new sfWidgetFormInputText(),
      'status'              => new sfWidgetFormInputText(),
      'peso'                => new sfWidgetFormInputText(),
      'observacion'         => new sfWidgetFormTextarea(),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'           => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'))),
      'titulo'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'tipo_cliente_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoCliente'), 'required' => false)),
      'pais_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pais'), 'required' => false)),
      'dni'                 => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'nombre'              => new sfValidatorString(array('max_length' => 150)),
      'apellido'            => new sfValidatorString(array('max_length' => 150)),
      'ocupacion'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'fecha_nacimiento'    => new sfValidatorDate(array('required' => false)),
      'sexo'                => new sfValidatorInteger(array('required' => false)),
      'edo_civil'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'nacionalidad'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'direcion'            => new sfValidatorString(array('required' => false)),
      'direccion_fisica'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_principal'  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'telefono_secundario' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'               => new sfValidatorString(array('max_length' => 40)),
      'website'             => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'status'              => new sfValidatorInteger(),
      'peso'                => new sfValidatorNumber(array('required' => false)),
      'observacion'         => new sfValidatorString(array('required' => false)),
      'user_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('cliente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }

}
