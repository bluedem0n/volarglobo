<?php

/**
 * Provincia form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProvinciaForm extends BaseProvinciaForm
{
  public function configure()
  {

     //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['codigo'],
        $this['created_at'],
        $this['updated_at']
              
      );

      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre de la provincia','class' => 'form-control'));
      
      
      
      //Seteo del campo imagen para poder subir las fotos
      $this->widgetSchema['imagen'] = new sfWidgetFormInputFileEditable(array(
        'label' => 'Bandera de la provincia',
        'file_src' =>  '/uploads/provincia/'.$this->getObject()->getImagen(),
        'is_image' => true,
        'edit_mode' => !$this->isNew(),
        'delete_label' => 'Borrar el Archivo',
        'template' => '<div>%file%<br />%input%<br />%delete%  %delete_label%</div> ',
          
              
      ));

      //Validacion del campo imagen para poder subir las fotos
      $this->validatorSchema['imagen'] = new sfValidatorFile(array(
        'required' => false,
        'path' => sfConfig::get('sf_upload_dir').'/provincia',
        'mime_types' => 'web_images',
        //Agregar esta linea para transformar la imagen
        'validated_file_class' => 'sfResizedFile'
      ));

      $this->validatorSchema['imagen_delete'] = new sfValidatorPass();

      //Plugin para transformar las imagenes
      //symfony plugin:install sfThumbnailPlugin
      
      
       //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
         'choices' => Categoria::$status,
         'expanded' => false,
         'multiple' => false

      ),array('class' => 'form-control'));
      
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones de la provincia','class' => 'form-control'));
  }
}
