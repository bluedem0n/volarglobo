<?php

/**
 * MascotaHasServicioBitacora form base class.
 *
 * @method MascotaHasServicioBitacora getObject() Returns the current form's model object
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMascotaHasServicioBitacoraForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'servicio_id' => new sfWidgetFormInputHidden(),
      'mascota_id'  => new sfWidgetFormInputHidden(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'servicio_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('servicio_id')), 'empty_value' => $this->getObject()->get('servicio_id'), 'required' => false)),
      'mascota_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('mascota_id')), 'empty_value' => $this->getObject()->get('mascota_id'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('mascota_has_servicio_bitacora[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MascotaHasServicioBitacora';
  }

}
