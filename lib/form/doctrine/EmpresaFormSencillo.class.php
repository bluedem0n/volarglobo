<?php

/**
 * Empresa form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EmpresaFormSencillo extends BaseEmpresaForm
{
  public function configure()
  {
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['empresa_id'],
        $this['created_at'],
        $this['updated_at'],
        $this['expires_at']

      );
      
     
    $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
    $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')." ".sfContext::getInstance()->getUser()->getAttribute('agente_user_apellido')));
      
    $this->widgetSchema['monto_caja'] = new sfWidgetFormInputHidden();
    
    
    if($this->isNew()){
    
    $this->widgetSchema['status'] = new sfWidgetFormInputHidden(array(),array('value'=> 1));
    }else{
    
    $this->widgetSchema['status'] = new sfWidgetFormInputHidden();
    }
      
     $this->widgetSchema['ciudad_id'] = new sfWidgetFormDoctrineChoice(array(
	            'model'     => 'Ciudad',
                    'add_empty' => 'Seleccione Ciudad',
      ));
      
 
      
     $this->widgetSchema['titulo'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Sra., Sr., Señorita','class' => 'form-control'));
      $this->widgetSchema['nacionalidad'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Peruana, Venezolana, Mexicana', 'class'=> 'form-control'));
      $this->widgetSchema['edo_civil'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Solter@, Casad@','class' => 'form-control'));
      $this->widgetSchema['ocupacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Ingenier@, Arquitect@','class' => 'form-control'));
      $this->widgetSchema['grado_instruccion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Universitaria, No estudio','class' => 'form-control'));
      
     
          
     //Cambiar a lista y su validador d
      $feriados = new Feriados();
     
     $this->widgetSchema['feriados'] = new sfWidgetFormDoctrineChoice(array(
	            'model'     => 'Feriados',
                    'key_method'=>'getFecha',
                    'expanded' => true,
                    'multiple' => true,
                    'query'    => $feriados->getFeriados(''.date('Y').'-01-01'),
                    
      ));
     
     
     
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del empresa','class' => 'form-control','style'=> "text-transform:uppercase;"));
      $this->widgetSchema['rif'] = new sfWidgetFormInputText(array(),array('placeholder'=>'RUC','class' => 'form-control solo-numero'));
      $this->widgetSchema['dni'] = new sfWidgetFormInputText(array(),array('placeholder'=>'DNI','class' => 'form-control solo-numero'));
      $this->widgetSchema['nickname'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nickname del empresa','class' => 'form-control','style'=> "text-transform:uppercase;"));
      $this->widgetSchema['direccion_fiscal'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Dirección fiscal del empresa','class' => 'form-control'));
      $this->widgetSchema['direccion_fisica'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Dirección fisica del empresa','class' => 'form-control'));
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones sobre el empresa','class' => 'form-control'));
      $this->widgetSchema['telefono1'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Teléfono del empresa','class' => 'form-control solo-numero'));
      $this->widgetSchema['telefono2'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Teléfono adicional del empresa','class' => 'form-control solo-numero'));
      $this->widgetSchema['email'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Correo','class' => 'form-control'));
      $this->widgetSchema['contacto_nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del contacto del empresa','class' => 'form-control'));
      $this->widgetSchema['contacto_puesto'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Puesto del contacto del empresa','class' => 'form-control'));
      
      $this->widgetSchema['sitio_web'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Sitio web de la empresa','class' => 'form-control','style'=> "text-transform:lowercase;"));
      $this->widgetSchema['politica_reintegro'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Politicas de reintegro de la empresa','class' => 'form-control'));
      
        
        
        
         $this->widgetSchema['idioma_id'] = new sfWidgetFormChoice(array(
           'choices' => Empresa::$idioma,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
         
        $this->widgetSchema['zona_horaria_id'] = new sfWidgetFormChoice(array(
           'choices' => Empresa::$zona_horaria,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
      
   
     
  }
}
