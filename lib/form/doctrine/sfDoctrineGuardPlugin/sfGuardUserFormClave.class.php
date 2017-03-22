<?php

/**
 * sfGuardUser form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormClave extends PluginsfGuardUserForm
{
  public function configure()
  {

      $this->removeField();

       

      
      $this->widgetSchema ['password'] = new sfWidgetFormInputPassword (array(),array('autocomplete'=>'off'));
      $this->widgetSchema ['password2'] = new sfWidgetFormInputPassword (array(),array('autocomplete'=>'off'));

      $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
        new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password2', array(),
        array('invalid' => 'Las contraseñas deden ser iguales')),
      ))); 

      $this->validatorSchema['password2'] = new sfValidatorPass();
        $this->widgetSchema->moveField('password2', 'after', 'password');
      $this->widgetSchema['password']->setLabel('Clave');
      $this->widgetSchema['password2']->setLabel('Repetir Clave');
      
        $this->widgetSchema['first_name'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['last_name'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['identificacion'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['direcion'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['telefono_principal'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['sexo'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['edo_civil'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['telefono_principal'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['telefono_adicional'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['telefono_emergencia'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['telefono_familiar'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['nacionalidad'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['ciudad_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['email_address'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['username'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['identificacion_archivo'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['domicilio_archivo'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['foto_archivo'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['is_active'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['is_super_admin'] = new sfWidgetFormInputHidden();
      
        

  }
  
  

  protected function removeField() {
      unset(
        $this['created_at'],
        $this['updated_at'],
        $this['algorithm'],
        $this['last_login'],
        $this['salt'],
        $this['groups_list'],
        $this['permissions_list']
      );
      
      
      

  }


}
