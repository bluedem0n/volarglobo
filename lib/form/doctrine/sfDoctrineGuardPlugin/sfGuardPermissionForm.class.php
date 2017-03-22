<?php

/**
 * sfGuardPermission form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardPermissionForm extends PluginsfGuardPermissionForm
{
  public function configure()
  {
      
      
       //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at']
      );
      
      
      $this->widgetSchema['name']->setLabel('Nombre');
      $this->widgetSchema['description']->setLabel('Descripcion');

      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['name'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del perfil','class' => 'form-control'));
      $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Descripción breve del perfil','class' => 'form-control'));

      $this->widgetSchema['groups_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['groups_list']->setLabel('Listado de Grupos');

      $this->widgetSchema['users_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['users_list']->setLabel('Listado de Usuarios');
      
             
     
      
      $this->widgetSchema['detalles'] = new sfWidgetFormChoice(array(
         'choices' => sfGuardPermission::$detalles,
         'expanded' => true,
         'multiple' => true,

      ));
       $this->validatorSchema['detalles'] = new sfValidatorChoice( 
                  array('choices'=>array_keys(sfGuardPermission::$detalles),
                  'multiple'=>true, 'required'=>false
         ));

        $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
                 'choices' => Categoria::$status,
                 'expanded' => false,
                 'multiple' => false

              ),array('class' => 'form-control'));
        
        
        
  }
  
  
}
