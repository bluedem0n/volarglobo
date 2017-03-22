<?php

/**
 * Marca form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MarcaForm extends BaseMarcaForm
{
  public function configure()
  {
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['orden']

      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del tipo de marca','class' => 'form-control'));
      $this->widgetSchema['descripcion_breve'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Descripción del marca','class' => 'form-control textarea'));
      
      //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
         'choices' => Categoria::$status,
         'expanded' => false,
         'multiple' => false

      ),array('class' => 'form-control'));

      $this->validatorSchema['status'] = new sfValidatorChoice(array(
          'choices' => array_keys(Categoria::$status),

      ));
      
      
        $file_src = $this->getObject()->getImagen();
        if ($this->getObject()->isNew()||(!$this->getObject()->getImagen()))
        {
          $file_src = 'default_image.jpg';
        }


       
           
        $this->widgetSchema['imagen'] = new sfWidgetFormInputFileEditable(array(
            'label' => ' ',
            'file_src' => '/uploads/marca/'.$file_src,
            'is_image' => true,
            'edit_mode' => true,
            'template' => '<div>%file%<br />%input%</div>',
        ));
        
      //Validacion del campo imagen para poder subir las fotos
      $this->validatorSchema['imagen'] = new sfValidatorFile(array(
        'required' => false,
        'path' => 'uploads/marca/',
          
        'mime_types' => array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png',
                    'image/x-png',
                    'image/gif'
                ),
        //Agregar esta linea para transformar la imagen
        'validated_file_class' => 'sfResizedFileMarca'
      ));
      
      
      
      
      
  }
}
