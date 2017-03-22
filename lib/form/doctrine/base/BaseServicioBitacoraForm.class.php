<?php

/**
 * ServicioBitacora form base class.
 *
 * @method ServicioBitacora getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServicioBitacoraForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'agendado_bitacora_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AgendadoBitacora'), 'add_empty' => false)),
      'servicio_tipo_id'     => new sfWidgetFormInputText(),
      'categoria_id'         => new sfWidgetFormInputText(),
      'producto_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Producto'), 'add_empty' => false)),
      'servicio_status_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ServicioStatus'), 'add_empty' => false)),
      'tamano_id'            => new sfWidgetFormInputText(),
      'presentacion_id'      => new sfWidgetFormInputText(),
      'codigo'               => new sfWidgetFormInputText(),
      'cantidad'             => new sfWidgetFormInputText(),
      'nota'                 => new sfWidgetFormTextarea(),
      'precio'               => new sfWidgetFormInputText(),
      'impuestos'            => new sfWidgetFormInputText(),
      'puntos'               => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'agendado_bitacora_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AgendadoBitacora'))),
      'servicio_tipo_id'     => new sfValidatorInteger(),
      'categoria_id'         => new sfValidatorInteger(),
      'producto_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Producto'))),
      'servicio_status_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ServicioStatus'))),
      'tamano_id'            => new sfValidatorInteger(array('required' => false)),
      'presentacion_id'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'codigo'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cantidad'             => new sfValidatorInteger(),
      'nota'                 => new sfValidatorString(array('required' => false)),
      'precio'               => new sfValidatorNumber(array('required' => false)),
      'impuestos'            => new sfValidatorNumber(array('required' => false)),
      'puntos'               => new sfValidatorInteger(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('servicio_bitacora[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ServicioBitacora';
  }

}
