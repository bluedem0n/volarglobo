<?php

/**
 * Usuario form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UsuarioBackendForm extends UsuarioForm
{
  public function configure()
  {
      parent::configure();
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));

  }


  protected function removeField() {
       //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['comun_id'],
        $this['user_id']
      );
  }

  
  
}
