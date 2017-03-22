<?php

/**
 * Rede form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RedeForm extends BaseRedeForm
{
  public function configure()
  {
      
      
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at']
        
      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre de la red social','class' => 'form-control'));
      $this->widgetSchema['logo'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Logo de la red social','class' => 'form-control'));
      
        
        $file_src = $this->getObject()->getLogo();
        if ($this->getObject()->isNew()||(!$this->getObject()->getLogo()))
        {
          $file_src = 'default_image.jpg';
        }


       
           
        $this->widgetSchema['logo'] = new sfWidgetFormInputFileEditable(array(
            'label' => ' ',
            'file_src' => '/uploads/redes/'.$file_src,
            'is_image' => true,
            'edit_mode' => true,
            'template' => '<div>%file%<br />%input%</div>',
        ));
        
      //Validacion del campo logo para poder subir las fotos
      $this->validatorSchema['logo'] = new sfValidatorFile(array(
        'required' => false,
        'path' => 'uploads/redes/',
          
        'mime_types' => array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png',
                    'image/x-png',
                    'image/gif'
                ),
        //Agregar esta linea para transformar la logo
        'validated_file_class' => 'sfResizedFilePago'
      ));
      
      
         //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
         'choices' => Categoria::$status,
         'expanded' => false,
         'multiple' => false

      ),array('class' => 'form-control'));
      
  }
}
