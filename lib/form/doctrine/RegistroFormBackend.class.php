<?php

/**
 * Registro form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RegistroFormBackend extends BaseRegistroForm
{
  public function configure()
  {
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['empresa_id']
      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      
      $this->validatorSchema['email'] = new sfValidatorAnd(array(
          $this->validatorSchema['email'],
          new sfValidatorEmail(),
     ));
  }
}
