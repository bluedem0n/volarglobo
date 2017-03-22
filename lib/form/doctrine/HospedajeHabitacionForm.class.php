<?php

/**
 * HospedajeHabitacion form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HospedajeHabitacionForm extends BaseHospedajeHabitacionForm
{
  public function configure()
  {
      
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['hospedaje_id']

      );
      
       $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre','class' => 'form-control'));
       
       $this->widgetSchema['precio'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));
       
       
       for($i=1;$i<=10;$i++) $cantidad[$i] = $i;
      
      
       //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['cantidad_personas'] = new sfWidgetFormChoice(array(
         'choices' => $cantidad,
         'expanded' => false,
         'multiple' => false
      ),array('class' => 'form-control'));
      
       $tipo_habitacion = new TipoHabitacion();
        $this->widgetSchema['tipo_habitacion_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'TipoHabitacion',
                  'key_method'=>'getId',
                  'query'    => $tipo_habitacion->getTipoHabitacionSelect(),
        ),array('class' => 'form-control'));
        
        
        
        $file_src = $this->getObject()->getFoto();
        if ($this->getObject()->isNew()||(!$this->getObject()->getFoto()))
        {
          $file_src = 'default_image.jpg';
        }


       
           
        $this->widgetSchema['foto'] = new sfWidgetFormInputFileEditable(array(
            'label' => ' ',
            'file_src' => '/uploads/habitacion/'.$file_src,
            'is_image' => true,
            'edit_mode' => false,
            
        ));
        
      //Validacion del campo foto para poder subir las fotos
      $this->validatorSchema['foto'] = new sfValidatorFile(array(
        'required' => false,
        'path' => 'uploads/habitacion/',
          
        'mime_types' => array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png',
                    'image/x-png',
                    'image/gif'
                ),
        //Agregar esta linea para transformar la foto
        'validated_file_class' => 'sfResizedFilePago'
      ));
        
        
        
        //Cambiar a lista y su validador d
      $tipo_camas = new TipoCama();
     
     $this->widgetSchema['tipo_cama'] = new sfWidgetFormDoctrineChoice(array(
	            'model'     => 'TipoCama',
                    'key_method'=>'getId',
                    'expanded' => false,
                    'multiple' => false,
                    'query'    => $tipo_camas->getTipoCamaSelect(),
                    
      ),array('class' => 'form-control')); 
      
      
      
  }
}
