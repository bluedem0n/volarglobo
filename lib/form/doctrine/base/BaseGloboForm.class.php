<?php

/**
 * Globo form base class.
 *
 * @method Globo getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGloboForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'empresa_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'ubicacion_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => true)),
      'marca_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Marca'), 'add_empty' => false)),
      'canastilla_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Canastilla'), 'add_empty' => true)),
      'quemador_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quemador'), 'add_empty' => true)),
      'modelo'                => new sfWidgetFormInputText(),
      'numero_serie'          => new sfWidgetFormInputText(),
      'nombre'                => new sfWidgetFormInputText(),
      'peso_limite'           => new sfWidgetFormInputText(),
      'peso_max_vacio'        => new sfWidgetFormInputText(),
      'peso_max_pasajeros'    => new sfWidgetFormInputText(),
      'combustible'           => new sfWidgetFormInputText(),
      'tamano'                => new sfWidgetFormInputText(),
      'cantidad_tanques'      => new sfWidgetFormInputText(),
      'capacidad'             => new sfWidgetFormInputText(),
      'certificado'           => new sfWidgetFormTextarea(),
      'descripcion'           => new sfWidgetFormTextarea(),
      'observacion'           => new sfWidgetFormTextarea(),
      'orden'                 => new sfWidgetFormInputText(),
      'imagen'                => new sfWidgetFormInputText(),
      'status'                => new sfWidgetFormInputText(),
      'mantenimiento_proximo' => new sfWidgetFormDate(),
      'mantenimiento_ultimo'  => new sfWidgetFormDate(),
      'user_id'               => new sfWidgetFormInputText(),
      'user_name'             => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'ubicacion_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'required' => false)),
      'marca_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Marca'))),
      'canastilla_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Canastilla'), 'required' => false)),
      'quemador_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Quemador'), 'required' => false)),
      'modelo'                => new sfValidatorString(array('max_length' => 100)),
      'numero_serie'          => new sfValidatorString(array('max_length' => 100)),
      'nombre'                => new sfValidatorString(array('max_length' => 100)),
      'peso_limite'           => new sfValidatorNumber(array('required' => false)),
      'peso_max_vacio'        => new sfValidatorNumber(array('required' => false)),
      'peso_max_pasajeros'    => new sfValidatorNumber(array('required' => false)),
      'combustible'           => new sfValidatorNumber(array('required' => false)),
      'tamano'                => new sfValidatorInteger(array('required' => false)),
      'cantidad_tanques'      => new sfValidatorInteger(array('required' => false)),
      'capacidad'             => new sfValidatorInteger(array('required' => false)),
      'certificado'           => new sfValidatorString(array('required' => false)),
      'descripcion'           => new sfValidatorString(array('required' => false)),
      'observacion'           => new sfValidatorString(array('required' => false)),
      'orden'                 => new sfValidatorString(array('max_length' => 50)),
      'imagen'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'status'                => new sfValidatorInteger(),
      'mantenimiento_proximo' => new sfValidatorDate(),
      'mantenimiento_ultimo'  => new sfValidatorDate(),
      'user_id'               => new sfValidatorInteger(array('required' => false)),
      'user_name'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('globo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Globo';
  }

}
