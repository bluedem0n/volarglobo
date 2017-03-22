<?php

/**
 * sfGuardUser form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {

      $this->removeField();
      
      $this->widgetSchema['first_name'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre','class' => 'form-control'));
      $this->widgetSchema['last_name'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Apellido','class' => 'form-control'));
      $this->widgetSchema['identificacion'] = new sfWidgetFormInputText(array(),array('placeholder'=>'DNI','class' => 'form-control'));
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones sobre el personal','class' => 'form-control textarea'));
      
      
      $this->widgetSchema['is_active'] = new sfWidgetFormChoice(array(
         'choices' => sfGuardUser::$is_active,
         'expanded' => false,
         'multiple' => false,

      ),array('class' => 'form-control'));
      

      
      $this->widgetSchema['email_address'] = new sfWidgetFormInputText(array(),array('placeholder'=>'micorreo@cuenta.com','class' => 'form-control'));
      
      $this->validatorSchema['email_address'] = new sfValidatorAnd(array(
        $this->validatorSchema['email_address'],
        new sfValidatorEmail()
        
      ));

      $this->widgetSchema ['username'] = new sfWidgetFormInputText (array(),array('autocomplete'=>'off','class' => 'form-control'));
      $this->widgetSchema ['password'] = new sfWidgetFormInputPassword (array(),array('autocomplete'=>'off','class' => 'form-control'));
      $this->widgetSchema ['password2'] = new sfWidgetFormInputPassword (array(),array('autocomplete'=>'off','class' => 'form-control'));

      $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
        new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password2', array(),
        array('invalid' => 'Las contraseñas deden ser iguales')),
      ))); 

      $this->validatorSchema['password2'] = new sfValidatorPass();

      $this->widgetSchema->moveField('password2', 'after', 'password');
      
      $this->setDefault('is_active', false);
      $this->setDefault('is_super_admin', false);
      $this->widgetSchema['password']->setLabel('Clave');
      $this->widgetSchema['password2']->setLabel('Repetir Clave');
      
      
      $this->widgetSchema['licencia_conducir_fecha'] = new sfWidgetFormInput(array(), array('size' => 15, 'id' => 'fechaLicencia', 'readonly'=>'readonly'));
      
    
      $empresa = new Empresa();
      $this->widgetSchema['empresa_id'] = new sfWidgetFormDoctrineChoice(array(
                      'model'     => 'Empresa',
                      'key_method'=>'getId',
                      'add_empty'   => 'Seleccione franquicia',
                      'query'    => $empresa->getEmpresasPagerTodas()
            ),array('class' => 'form-control'));
      
      
      $tipo_personal = new TipoPersonal();
      $this->widgetSchema['tipo_personal_id'] = new sfWidgetFormDoctrineChoice(array(
                      'model'     => 'TipoPersonal',
                      'key_method'=>'getId',
                      'query'    => $tipo_personal->getTipoPersonales()
            ),array('class' => 'form-control'));
      
      
      
      //Cambiar a lista y su validador de los required No o Si 0/1
      $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array(
         'choices' => sfGuardUser::$sexo,
         'expanded' => false,
         'multiple' => false,

      ),array('class' => 'form-control'));
      
      //Campos dinamicos de la tabla empresa
     
      $titulo = explode(',', sfContext::getInstance()->getUser()->getAttribute('select_titulo'));
      $Titulo  = array('Seleccione titulo'=>'Seleccione titulo'); 
      foreach ($titulo as $valor) $Titulo = array_merge($Titulo ,array($valor=>$valor));
          
      $this->widgetSchema['titulo'] = new sfWidgetFormChoice(array(
         'choices' => $Titulo,
         'expanded' => false,
         'multiple' => false,

      ),array('class' => 'form-control'));
      
      $edo_civil = explode(',', sfContext::getInstance()->getUser()->getAttribute('select_edo_civil'));
      $edoCivil  = array('Seleccione estado civil'=>'Seleccione estado civil'); 
      foreach ($edo_civil as $valor) $edoCivil = array_merge($edoCivil ,array($valor=>$valor));
          
      $this->widgetSchema['edo_civil'] = new sfWidgetFormChoice(array(
         'choices' => $edoCivil,
         'expanded' => false,
         'multiple' => false,

      ),array('class' => 'form-control'));
      
      $nacionalidad = explode(',', sfContext::getInstance()->getUser()->getAttribute('select_nacionalidad'));
      $Nacionalidad  = array('Seleccione nacionalidad'=>'Seleccione nacionalidad'); 
      foreach ($nacionalidad as $valor) $Nacionalidad = array_merge($Nacionalidad ,array($valor=>$valor));
          
      $this->widgetSchema['nacionalidad'] = new sfWidgetFormChoice(array(
         'choices' => $Nacionalidad,
         'expanded' => false,
         'multiple' => false,

      ),array('class' => 'form-control')); 
      
      $ocupacion = explode(',', sfContext::getInstance()->getUser()->getAttribute('select_ocupacion'));
      $Ocupacion  = array('Seleccione ocupación'=>'Seleccione ocupación'); 
      foreach ($ocupacion as $valor) $Ocupacion = array_merge($Ocupacion ,array($valor=>$valor));
          
      $this->widgetSchema['ocupacion'] = new sfWidgetFormChoice(array(
         'choices' => $Ocupacion,
         'expanded' => false,
         'multiple' => false,

      ),array('class' => 'form-control')); 
      
      
      
         $grado_instruccion = explode(',', sfContext::getInstance()->getUser()->getAttribute('select_grado_instruccion'));
      $GradoInstruccion  = array('Seleccione grado instrución'=>'Seleccione grado instrución'); 
      foreach ($grado_instruccion as $valor) $GradoInstruccion = array_merge($GradoInstruccion ,array($valor=>$valor));
          
      $this->widgetSchema['grado_instruccion'] = new sfWidgetFormChoice(array(
         'choices' => $GradoInstruccion,
         'expanded' => false,
         'multiple' => false,

      ),array('class' => 'form-control')); 
      
      
      
      $this->widgetSchema['telefono_principal'] = new sfWidgetFormInputText(array(),array('placeholder'=>'5555555555','class' => 'form-control'));
      
      
      $this->widgetSchema['direcion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Dirección ','class' => 'form-control'));
      
      $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control', 'type' =>'date'));
      $this->widgetSchema['ingreso'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control', 'type' =>'date'));
      $this->widgetSchema['salida'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control', 'type' =>'date'));
    
//manejar carga de archivos den symfony

      
      
      

  }
  
  

  protected function removeField() {
      unset(
        $this['created_at'],
        $this['updated_at'],
        $this['algorithm'],
        $this['last_login'],
        $this['alerta'],
        $this['salt']
      );
      
      
      
      
      
      
      
      $this->widgetSchema['groups_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['groups_list']->setLabel('Listado de Grupos');

      $this->widgetSchema['permissions_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['permissions_list']->setLabel('Listado de Perfiles');
  }


}
