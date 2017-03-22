<?php

/**
 * EmpresaSeccion form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EmpresaSeccionForm extends BaseEmpresaSeccionForm
{
  public function configure()
  {
      
              
       unset (
        $this['created_at'],
        $this['updated_at']
      );
      
       $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
       $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
       $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
       
       
       $this->widgetSchema['titulo'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Titulo de la seccion - Quienes somos?','class' => 'form-control'));
       $this->widgetSchema['descripcion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Descripcion de la seccion - Quienes somos?','class' => 'form-control textarea'));
       
        
     //Cambiar a lista y su validador de los status Activo e Inativo 0/1
        $this->widgetSchema['imagen'] = new sfWidgetFormChoice(array(
           'choices' => Empresa::$images,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
       
    
  }
}
