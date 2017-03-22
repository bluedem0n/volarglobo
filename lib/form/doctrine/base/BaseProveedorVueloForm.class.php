<?php

/**
 * ProveedorVuelo form base class.
 *
 * @method ProveedorVuelo getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProveedorVueloForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'empresa_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'codigo'             => new sfWidgetFormInputText(),
      'globo_id'           => new sfWidgetFormInputText(),
      'tipo_vuelo_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoVuelo'), 'add_empty' => false)),
      'tipo_tarifa_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoTarifa'), 'add_empty' => false)),
      'tipo_motivo_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoMotivo'), 'add_empty' => false)),
      'tipo_lona_id'       => new sfWidgetFormInputText(),
      'status'             => new sfWidgetFormInputText(),
      'horario'            => new sfWidgetFormTextarea(),
      'observacion'        => new sfWidgetFormTextarea(),
      'condiciones'        => new sfWidgetFormTextarea(),
      'fecha_limite'       => new sfWidgetFormDate(),
      'fecha_activacion'   => new sfWidgetFormDate(),
      'fecha_finalizacion' => new sfWidgetFormDate(),
      'precio'             => new sfWidgetFormInputText(),
      'precio_oferta'      => new sfWidgetFormInputText(),
      'user_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'          => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'codigo'             => new sfValidatorInteger(),
      'globo_id'           => new sfValidatorInteger(),
      'tipo_vuelo_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoVuelo'))),
      'tipo_tarifa_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoTarifa'))),
      'tipo_motivo_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoMotivo'))),
      'tipo_lona_id'       => new sfValidatorInteger(),
      'status'             => new sfValidatorInteger(array('required' => false)),
      'horario'            => new sfValidatorString(array('required' => false)),
      'observacion'        => new sfValidatorString(array('required' => false)),
      'condiciones'        => new sfValidatorString(array('required' => false)),
      'fecha_limite'       => new sfValidatorDate(array('required' => false)),
      'fecha_activacion'   => new sfValidatorDate(),
      'fecha_finalizacion' => new sfValidatorDate(),
      'precio'             => new sfValidatorNumber(array('required' => false)),
      'precio_oferta'      => new sfValidatorNumber(array('required' => false)),
      'user_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('proveedor_vuelo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProveedorVuelo';
  }

}
