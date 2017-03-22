<?php

/**
 * Empresa form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EmpresaForm extends BaseEmpresaForm
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
    $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
    
      
     $this->widgetSchema['ciudad_id'] = new sfWidgetFormDoctrineChoice(array(
	            'model'     => 'Ciudad',
                    'add_empty' => 'Seleccione Ciudad',
      ));
      
 
      
     $this->widgetSchema['titulo'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Sra., Sr., Señorita','class' => 'form-control'));
      $this->widgetSchema['nacionalidad'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Peruana, Venezolana, Mexicana', 'class'=> 'form-control'));
      $this->widgetSchema['edo_civil'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Solter@, Casad@','class' => 'form-control'));
      $this->widgetSchema['ocupacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Ingenier@, Arquitect@','class' => 'form-control'));
      $this->widgetSchema['grado_instruccion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo Universitaria, No estudio','class' => 'form-control'));
      
     
          
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del empresa','class' => 'form-control','style'=> "text-transform:uppercase;"));
      $this->widgetSchema['rif'] = new sfWidgetFormInputText(array(),array('placeholder'=>'RUC','class' => 'form-control solo-numero'));
      $this->widgetSchema['dni'] = new sfWidgetFormInputText(array(),array('placeholder'=>'DNI','class' => 'form-control solo-numero'));
      $this->widgetSchema['nickname'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nickname del empresa','class' => 'form-control','style'=> "text-transform:uppercase;"));
      $this->widgetSchema['direccion_fiscal'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Dirección fiscal del empresa','class' => 'form-control textarea'));
      
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones sobre el empresa','class' => 'form-control textarea'));
      $this->widgetSchema['telefono1'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Teléfono del empresa','class' => 'form-control solo-numero'));
      $this->widgetSchema['telefono2'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Teléfono adicional del empresa','class' => 'form-control solo-numero'));
      $this->widgetSchema['email'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Correo','class' => 'form-control'));
      $this->widgetSchema['contacto_nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del contacto del empresa','class' => 'form-control'));
      $this->widgetSchema['contacto_puesto'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Puesto del contacto del empresa','class' => 'form-control'));
      
      $this->widgetSchema['sitio_web'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Sitio web de la empresa','class' => 'form-control','style'=> "text-transform:lowercase;"));
      $this->widgetSchema['politicas'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Politicas de reintegro de la empresa','class' => 'form-control textarea'));
      $this->widgetSchema['privacidad'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Politicas de privacidad de la empresa','class' => 'form-control textarea'));
      
      
      $this->widgetSchema['faq_titulo'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Titulo de FAQ','class' => 'form-control','style'=> "text-transform:lowercase;"));
      $this->widgetSchema['faq_contenido'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Desorrollo de FAQ','class' => 'form-control textarea'));
      
      
      $this->widgetSchema['quienes_titulo'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Titulo de quienes - somos','class' => 'form-control','style'=> "text-transform:lowercase;"));
      $this->widgetSchema['quienes_contenido'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Desorrollo de quienes - somos','class' => 'form-control textarea'));
      
      
       
      
        $file_src = $this->getObject()->getQuienesImagen();
        if ($this->getObject()->isNew()||(!$this->getObject()->getQuienesImagen()))
        {
          $file_src = 'default_image.jpg';
        }


       
           
        $this->widgetSchema['quienes_imagen'] = new sfWidgetFormInputFileEditable(array(
            'label' => ' ',
            'file_src' => '/uploads/quienes-somos/'.$file_src,
            'is_image' => true,
            'edit_mode' => true,
            'template' => '<div>%file%<br />%input%</div>',
        ));
        
      //Validacion del campo imagen para poder subir las fotos
      $this->validatorSchema['quienes_imagen'] = new sfValidatorFile(array(
        'required' => false,
        'path' => 'uploads/quienes-somos/',
          
        'mime_types' => array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png',
                    'image/x-png',
                    'image/gif'
                ),
        //Agregar esta linea para transformar la imagen
        'validated_file_class' => 'sfResizedFilePago'
      ));
      
      
      
      
        //Cambiar a lista y su validador de los status Activo e Inativo 0/1
        $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
           'choices' => Categoria::$status,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
        
        
         $this->widgetSchema['idioma_id'] = new sfWidgetFormChoice(array(
           'choices' => Empresa::$idioma,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
         
      
   
     
  }
}
