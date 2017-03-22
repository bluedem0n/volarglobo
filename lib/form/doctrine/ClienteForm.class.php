<?php

/**
 * Cliente form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClienteForm extends BaseClienteForm
{
  public function configure()
  {

      $this->removeField();
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['status'] = new sfWidgetFormInputHidden(array(),array('value'=> 1));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre','class' => 'form-control'));
      $this->widgetSchema['apellido'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Apellido','class' => 'form-control'));
      $this->widgetSchema['dni'] = new sfWidgetFormInputText(array(),array('placeholder'=>'DNI','class' => 'form-control'));
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones sobre el personal','class' => 'form-control textarea'));
      
      $this->widgetSchema['email'] = new sfWidgetFormInputText(array(),array('placeholder'=>'micorreo@cuenta.com','class' => 'form-control'));
      
      
      
       $tipoCliente = new TipoCliente();
        $this->widgetSchema['tipo_cliente_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'TipoCliente',
                  'key_method'=>'getId',
                  'query'    => $tipoCliente->getTipoClientes(),
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
      
      
       $ocupacion = explode(',', sfContext::getInstance()->getUser()->getAttribute('select_ocupacion'));
      $Ocupacion  = array('Seleccione ocupación'=>'Seleccione ocupación'); 
      foreach ($ocupacion as $valor) $Ocupacion = array_merge($Ocupacion ,array($valor=>$valor));
          
      $this->widgetSchema['ocupacion'] = new sfWidgetFormChoice(array(
         'choices' => $Ocupacion,
         'expanded' => false,
         'multiple' => false,

      ),array('class' => 'form-control')); 
      
      $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormInputText(array(), array( 'class' => 'form-control', 'type' =>'date'));
      
        $nacionalidad = explode(',', sfContext::getInstance()->getUser()->getAttribute('select_nacionalidad'));
      $Nacionalidad  = array('Seleccione nacionalidad'=>'Seleccione nacionalidad'); 
      foreach ($nacionalidad as $valor) $Nacionalidad = array_merge($Nacionalidad ,array($valor=>$valor));
          
      $this->widgetSchema['nacionalidad'] = new sfWidgetFormChoice(array(
         'choices' => $Nacionalidad,
         'expanded' => false,
         'multiple' => false,

      ),array('class' => 'form-control')); 
      
      $this->widgetSchema['telefono_principal'] = new sfWidgetFormInputText(array(),array('placeholder'=>'5555555555','class' => 'form-control'));
      
      
      $this->widgetSchema['direcion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Dirección','class' => 'form-control textarea'));
      

  }
  
  

  protected function removeField() {
      unset(
        $this['created_at'],
        $this['updated_at']
        
      );
      
      
      
  }


}
