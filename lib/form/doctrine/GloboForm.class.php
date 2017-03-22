<?php

/**
 * Globo form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GloboForm extends BaseGloboForm
{
  public function configure()
  {
      
       //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['orden'],
        $this['mantenimiento_ultimo']

      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del globo','class' => 'form-control'));
      $this->widgetSchema['descripcion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Descripción del globo','class' => 'form-control'));
      
      $this->widgetSchema['peso_max_vacio'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));
      $this->widgetSchema['peso_max_pasajeros'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));
      $this->widgetSchema['peso_limite'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));
      $this->widgetSchema['capacidad'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0','class' => 'form-control'));
      $this->widgetSchema['certificado'] = new sfWidgetFormInputText(array(),array('placeholder'=>'','class' => 'form-control'));
      
  
       $marca = new Marca();
        $this->widgetSchema['marca_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'Marca',
                  'key_method'=>'getId',
                  'query'    => $marca->getMarcaSelect(),
        ),array('class' => 'form-control'));
      
      
      $this->widgetSchema['modelo'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Modelo','class' => 'form-control'));
      $this->widgetSchema['numero_serie'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Número serie','class' => 'form-control'));
      $this->widgetSchema['tamano'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Tamaño','class' => 'form-control'));
      
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones','class' => 'form-control textarea'));
   
      $this->widgetSchema['mantenimiento_proximo'] = new sfWidgetFormInputText(array(),array('placeholder'=>'00/00/0000', 'readonly' =>  'true', 'class' => 'form-control date'));
      
      $provincia = new Ubicacion();
      $this->widgetSchema['ubicacion_id'] = new sfWidgetFormDoctrineChoice(array(
                      'model'     => 'Ubicacion',
                      'key_method'=>'getId',
                      'query'    => $provincia->getUbicacionesSelect()
            ),array('class' => 'form-control'));
      

      //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
         'choices' => Categoria::$status,
         'expanded' => false,
         'multiple' => false

      ),array('class' => 'form-control'));
      
      
        $file_src = $this->getObject()->getImagen();
        if ($this->getObject()->isNew()||(!$this->getObject()->getImagen()))
        {
          $file_src = 'default_image.jpg';
        }


       
           
        $this->widgetSchema['imagen'] = new sfWidgetFormInputFileEditable(array(
            'label' => ' ',
            'file_src' => '/uploads/globo/'.$file_src,
            'is_image' => true,
            'edit_mode' => true,
            'template' => '<div>%file%<br />%input%</div>',
        ));
        
      //Validacion del campo imagen para poder subir las fotos
      $this->validatorSchema['imagen'] = new sfValidatorFile(array(
        'required' => false,
        'path' => 'uploads/globo/',
          
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
      
      
      
       $canastilla = new Canastilla();
        $this->widgetSchema['canastilla_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'Canastilla',
                  'key_method'=>'getId',
                  'query'    => $canastilla->getCanastillaSelect(),
        ),array('class' => 'form-control'));
        
        
        $quemador= new Quemador();
        $this->widgetSchema['quemador_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'Quemador',
                  'key_method'=>'getId',
                  'query'    => $quemador->getQuemadorSelect(),
        ),array('class' => 'form-control'));
      
      
      
        if($this->isNew()){
  
      //Sucursales 
      $mantenimientos = $this->getObject()->getMantenimientoGlobo();
      
      
      if(!count($mantenimientos)) {
          $mantenimientos = array();
      }      
      
      
        
            $mantenimiento = new MantenimientoGlobo();
            $mantenimiento->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
            $mantenimiento->setGlobo($this->getObject());
            array_push ($mantenimientos, $mantenimiento);
                        
            
      
      
      
              
      $mantenimientos_form = new sfForm();
      $count = 0;
      foreach ($mantenimientos as $mantenimiento){
          
          if($mantenimiento->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $mantenimiento_form = new MantenimientoGloboForm($mantenimiento);
                $mantenimientos_form->embedForm($count, $mantenimiento_form);
                $count++;
                
          }
      }

      $this->embedForm('mantenimientos', $mantenimientos_form);
      // Fin Sucursales
      
      }
        
      
  }
}
