<?php

/**
 * TipoTarifaPrecio form base class.
 *
 * @method TipoTarifaPrecio getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTipoTarifaPrecioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'empresa_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'tipo_tarifa_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoTarifa'), 'add_empty' => false)),
      'rango_edad_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RangoEdad'), 'add_empty' => false)),
      'precio'         => new sfWidgetFormInputText(),
      'user_id'        => new sfWidgetFormInputText(),
      'user_name'      => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'tipo_tarifa_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoTarifa'))),
      'rango_edad_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RangoEdad'))),
      'precio'         => new sfValidatorNumber(array('required' => false)),
      'user_id'        => new sfValidatorInteger(array('required' => false)),
      'user_name'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('tipo_tarifa_precio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoTarifaPrecio';
  }

}
