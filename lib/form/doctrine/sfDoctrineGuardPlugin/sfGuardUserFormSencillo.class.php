<?php

/**
 * sfGuardUser form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormSencillo extends PluginsfGuardUserForm
{
  public function configure()
  {

      $this->removeField();
      
      $this->widgetSchema['first_name'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre','class' => 'form-control'));
      $this->widgetSchema['last_name'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Apellido','class' => 'form-control'));
      $this->widgetSchema['identificacion'] = new sfWidgetFormInputText(array(),array('placeholder'=>'DNI','class' => 'form-control'));
      
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
      
      $this->widgetSchema['password']->setLabel('Clave');
      $this->widgetSchema['password2']->setLabel('Repetir Clave');
   
      
      
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
      
      
      //Seteo del campo imagen para poder subir las fotos
      $this->widgetSchema['foto_archivo'] = new sfWidgetFormInputFile();

      //Validacion del campo imagen para poder subir las fotos
      $this->validatorSchema['foto_archivo'] = new sfValidatorFile(array(
        'required' => false,
        'path' => sfConfig::get('sf_upload_dir').'/sfguarduser',
        'mime_types' => 'web_images',
        //Agregar esta linea para transformar la imagen
        'validated_file_class' => 'sfResizedFileProducto'
      ));
      
      
   

  }
  
  

  protected function removeField() {
      unset(
        $this['created_at'],
        $this['updated_at'],
        $this['algorithm'],
        $this['last_login'],
        $this['alerta'],
        $this['salt'],
        $this['is_active'],
        $this['observacion'],
        $this['is_super_admin'],
        $this['observacion'],
        $this['ingreso']
        
      );
      
      
      
      
      
      
      
      $this->widgetSchema['groups_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['groups_list']->setLabel('Listado de Grupos');

      $this->widgetSchema['permissions_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['permissions_list']->setLabel('Listado de Perfiles');
  }


}
