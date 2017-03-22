<?php

/**
 * ProveedorDescuento form base class.
 *
 * @method ProveedorDescuento getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProveedorDescuentoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'empresa_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'tipo'                  => new sfWidgetFormInputText(),
      'status'                => new sfWidgetFormInputText(),
      'categoria_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => false)),
      'proveedor_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'), 'add_empty' => false)),
      'nombre'                => new sfWidgetFormInputText(),
      'proveedor_sucursal_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorSucursal'), 'add_empty' => true)),
      'observacion'           => new sfWidgetFormTextarea(),
      'condiciones'           => new sfWidgetFormTextarea(),
      'fecha_limite'          => new sfWidgetFormInputText(),
      'fecha_activacion'      => new sfWidgetFormDateTime(),
      'fecha_finalizacion'    => new sfWidgetFormDateTime(),
      'num_descuentos'        => new sfWidgetFormInputText(),
      'comportamiento'        => new sfWidgetFormInputText(),
      'aplicacion'            => new sfWidgetFormInputText(),
      'precio'                => new sfWidgetFormInputText(),
      'precio_oferta'         => new sfWidgetFormInputText(),
      'destacado'             => new sfWidgetFormInputText(),
      'click'                 => new sfWidgetFormInputText(),
      'user_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'             => new sfWidgetFormInputText(),
      'imagen_uno'            => new sfWidgetFormInputText(),
      'imagen_dos'            => new sfWidgetFormInputText(),
      'imagen_tres'           => new sfWidgetFormInputText(),
      'imagen_cuatro'         => new sfWidgetFormInputText(),
      'imagen_cinco'          => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'slug'                  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'required' => false)),
      'tipo'                  => new sfValidatorInteger(array('required' => false)),
      'status'                => new sfValidatorInteger(array('required' => false)),
      'categoria_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'required' => false)),
      'proveedor_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proveedor'))),
      'nombre'                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'proveedor_sucursal_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProveedorSucursal'), 'required' => false)),
      'observacion'           => new sfValidatorString(array('required' => false)),
      'condiciones'           => new sfValidatorString(array('required' => false)),
      'fecha_limite'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'fecha_activacion'      => new sfValidatorDateTime(),
      'fecha_finalizacion'    => new sfValidatorDateTime(),
      'num_descuentos'        => new sfValidatorInteger(array('required' => false)),
      'comportamiento'        => new sfValidatorInteger(array('required' => false)),
      'aplicacion'            => new sfValidatorInteger(array('required' => false)),
      'precio'                => new sfValidatorNumber(array('required' => false)),
      'precio_oferta'         => new sfValidatorNumber(array('required' => false)),
      'destacado'             => new sfValidatorInteger(array('required' => false)),
      'click'                 => new sfValidatorInteger(array('required' => false)),
      'user_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'imagen_uno'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'imagen_dos'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'imagen_tres'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'imagen_cuatro'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'imagen_cinco'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
      'slug'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ProveedorDescuento', 'column' => array('slug', 'nombre')))
    );

    $this->widgetSchema->setNameFormat('proveedor_descuento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProveedorDescuento';
  }

}
