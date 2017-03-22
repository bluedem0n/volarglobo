<?php

/**
 * UsuarioHasGrupo form base class.
 *
 * @method UsuarioHasGrupo getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioHasGrupoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id' => new sfWidgetFormInputHidden(),
      'grupo_id'   => new sfWidgetFormInputHidden(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'usuario_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('usuario_id')), 'empty_value' => $this->getObject()->get('usuario_id'), 'required' => false)),
      'grupo_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('grupo_id')), 'empty_value' => $this->getObject()->get('grupo_id'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('usuario_has_grupo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioHasGrupo';
  }

}
