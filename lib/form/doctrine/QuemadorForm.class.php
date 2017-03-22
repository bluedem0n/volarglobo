<?php

/**
 * Quemador form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuemadorForm extends BaseQuemadorForm
{
  public function configure()
  {
      
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['mantenimiento_ultimo']
              
      );

      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      
           
        $marca = new Marca();
        $this->widgetSchema['marca_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'Marca',
                  'key_method'=>'getId',
                  'query'    => $marca->getMarcaSelect(),
        ),array('class' => 'form-control'));
      
      
      $this->widgetSchema['modelo'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Modelo','class' => 'form-control'));
      $this->widgetSchema['numero_serie'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Número serie','class' => 'form-control'));
      
      $this->widgetSchema['observaciones'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones','class' => 'form-control textarea'));
   
      $this->widgetSchema['mantenimiento_proximo'] = new sfWidgetFormInputText(array(),array('placeholder'=>'00/00/0000', 'readonly' =>  'true', 'class' => 'form-control date'));
      
      if($this->isNew()){
  
      //Sucursales 
      $mantenimientos = $this->getObject()->getMantenimientoQuemador();
      
      
      if(!count($mantenimientos)) {
          $mantenimientos = array();
      }      
      
      
        
            $mantenimiento = new MantenimientoQuemador();
            $mantenimiento->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
            $mantenimiento->setQuemador($this->getObject());
            array_push ($mantenimientos, $mantenimiento);
                        
            
      
      
      
              
      $mantenimientos_form = new sfForm();
      $count = 0;
      foreach ($mantenimientos as $mantenimiento){
          
          if($mantenimiento->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $mantenimiento_form = new MantenimientoQuemadorForm($mantenimiento);
                $mantenimientos_form->embedForm($count, $mantenimiento_form);
                $count++;
                
          }
      }

      $this->embedForm('mantenimientos', $mantenimientos_form);
      // Fin Sucursales
      
      }
      
      
  }
}
