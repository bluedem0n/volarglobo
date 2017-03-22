<?php

/**
 * Hospedaje form base class.
 *
 * @method Hospedaje getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHospedajeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'empresa_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
      'provincia_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'), 'add_empty' => true)),
      'ciudad_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => true)),
      'rif'               => new sfWidgetFormInputText(),
      'dni'               => new sfWidgetFormInputText(),
      'nombre'            => new sfWidgetFormInputText(),
      'nickname'          => new sfWidgetFormInputText(),
      'direccion_fiscal'  => new sfWidgetFormInputText(),
      'direccion_fisica'  => new sfWidgetFormInputText(),
      'horario'           => new sfWidgetFormTextarea(),
      'telefono1'         => new sfWidgetFormInputText(),
      'telefono2'         => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'website'           => new sfWidgetFormInputText(),
      'contacto_nombre'   => new sfWidgetFormInputText(),
      'contacto_puesto'   => new sfWidgetFormInputText(),
      'contacto_telefono' => new sfWidgetFormInputText(),
      'status'            => new sfWidgetFormInputText(),
      'descripcion'       => new sfWidgetFormTextarea(),
      'observacion'       => new sfWidgetFormTextarea(),
      'logo'              => new sfWidgetFormInputText(),
      'video'             => new sfWidgetFormTextarea(),
      'redes_sociales'    => new sfWidgetFormTextarea(),
      'palabras_claves'   => new sfWidgetFormTextarea(),
      'destacado'         => new sfWidgetFormInputText(),
      'click'             => new sfWidgetFormInputText(),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_name'         => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'slug'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'empresa_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'))),
      'provincia_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Provincia'), 'required' => false)),
      'ciudad_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'required' => false)),
      'rif'               => new sfValidatorString(array('max_length' => 25)),
      'dni'               => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 150)),
      'nickname'          => new sfValidatorString(array('max_length' => 150)),
      'direccion_fiscal'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'direccion_fisica'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'horario'           => new sfValidatorString(array('required' => false)),
      'telefono1'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'telefono2'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 40)),
      'website'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'contacto_nombre'   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'contacto_puesto'   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'contacto_telefono' => new sfValidatorInteger(array('required' => false)),
      'status'            => new sfValidatorInteger(),
      'descripcion'       => new sfValidatorString(array('required' => false)),
      'observacion'       => new sfValidatorString(array('required' => false)),
      'logo'              => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'video'             => new sfValidatorString(array('required' => false)),
      'redes_sociales'    => new sfValidatorString(array('required' => false)),
      'palabras_claves'   => new sfValidatorString(array('required' => false)),
      'destacado'         => new sfValidatorInteger(array('required' => false)),
      'click'             => new sfValidatorInteger(array('required' => false)),
      'user_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'user_name'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'slug'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Hospedaje', 'column' => array('slug', 'nombre')))
    );

    $this->widgetSchema->setNameFormat('hospedaje[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Hospedaje';
  }

}
