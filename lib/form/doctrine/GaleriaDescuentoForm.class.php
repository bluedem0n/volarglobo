<?php

/**
 * GaleriaDescuento form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GaleriaDescuentoForm extends BaseGaleriaDescuentoForm
{
  public function configure()
  {
      
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['proveedor_descuento_id']
      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      
      $this->widgetSchema['descripcion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Descripción de la imagen','class' => 'form-control'));
      
        
        $file_src = 's_'.$this->getObject()->getImagen();
        if ($this->getObject()->isNew()||(!$this->getObject()->getImagen()))
        {
          $file_src = 'default_image.jpg';
        }
        
        
        
        $this->widgetSchema['imagen'] = new sfWidgetFormInputFileEditable(array(
            'label' => ' ',
            'file_src' => '/uploads/descuento/'.$file_src,
            'is_image' => true,
            'edit_mode' => true,
            'template' => '<div>%file%<br />%input%</div>',
        ));
        
      //Validacion del campo imagen para poder subir las fotos
      $this->validatorSchema['imagen'] = new sfValidatorFile(array(
        'required' => false,
        'path' => 'uploads/descuento/',
          
        'mime_types' => array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png',
                    'image/x-png',
                    'image/gif'
                ),
        //Agregar esta linea para transformar la imagen
        'validated_file_class' => 'sfResizedFileGaleria'
      ));
        
       
       
       
  }
}
