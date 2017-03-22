<?php

/**
 * Empresa form base class.
 *
 * @method Empresa getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEmpresaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'rif'               => new sfWidgetFormInputText(),
      'dni'               => new sfWidgetFormInputText(),
      'nombre'            => new sfWidgetFormInputText(),
      'nickname'          => new sfWidgetFormInputText(),
      'direccion_fiscal'  => new sfWidgetFormInputText(),
      'telefono1'         => new sfWidgetFormInputText(),
      'telefono2'         => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'contacto_nombre'   => new sfWidgetFormInputText(),
      'contacto_puesto'   => new sfWidgetFormInputText(),
      'contacto_telefono' => new sfWidgetFormInputText(),
      'status'            => new sfWidgetFormInputText(),
      'idioma_id'         => new sfWidgetFormInputText(),
      'sitio_web'         => new sfWidgetFormInputText(),
      'observacion'       => new sfWidgetFormTextarea(),
      'politicas'         => new sfWidgetFormTextarea(),
      'privacidad'        => new sfWidgetFormTextarea(),
      'faq_titulo'        => new sfWidgetFormTextarea(),
      'faq_contenido'     => new sfWidgetFormTextarea(),
      'quienes_titulo'    => new sfWidgetFormInputText(),
      'quienes_contenido' => new sfWidgetFormInputText(),
      'quienes_imagen'    => new sfWidgetFormInputText(),
      'user_id'           => new sfWidgetFormInputText(),
      'user_name'         => new sfWidgetFormInputText(),
      'titulo'            => new sfWidgetFormInputText(),
      'nacionalidad'      => new sfWidgetFormTextarea(),
      'edo_civil'         => new sfWidgetFormInputText(),
      'ocupacion'         => new sfWidgetFormTextarea(),
      'grado_instruccion' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'rif'               => new sfValidatorString(array('max_length' => 25)),
      'dni'               => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'nombre'            => new sfValidatorString(array('max_length' => 150)),
      'nickname'          => new sfValidatorString(array('max_length' => 150)),
      'direccion_fiscal'  => new sfValidatorString(array('max_length' => 255)),
      'telefono1'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'telefono2'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'contacto_nombre'   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'contacto_puesto'   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'contacto_telefono' => new sfValidatorInteger(array('required' => false)),
      'status'            => new sfValidatorInteger(),
      'idioma_id'         => new sfValidatorInteger(array('required' => false)),
      'sitio_web'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'observacion'       => new sfValidatorString(array('required' => false)),
      'politicas'         => new sfValidatorString(array('required' => false)),
      'privacidad'        => new sfValidatorString(array('required' => false)),
      'faq_titulo'        => new sfValidatorString(array('required' => false)),
      'faq_contenido'     => new sfValidatorString(array('required' => false)),
      'quienes_titulo'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'quienes_contenido' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'quienes_imagen'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'user_id'           => new sfValidatorInteger(array('required' => false)),
      'user_name'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'titulo'            => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'nacionalidad'      => new sfValidatorString(array('required' => false)),
      'edo_civil'         => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'ocupacion'         => new sfValidatorString(array('required' => false)),
      'grado_instruccion' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('empresa[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empresa';
  }

}
