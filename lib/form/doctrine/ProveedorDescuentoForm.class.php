<?php

/**
 * ProveedorDescuento form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProveedorDescuentoForm extends BaseProveedorDescuentoForm
{
  public function configure()
  {
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
              $this['fecha_activacion'],
              $this['fecha_finalizacion'],
              $this['status']
      );
      
      $this->widgetSchema['tipo'] = new sfWidgetFormChoice(array(
           'choices' => ProveedorDescuento::$tipo,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
      
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
    
    
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Titulo','class' => 'form-control'));
      


        $categoria = new Categoria();
        $this->widgetSchema['categoria_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'Categoria',
                  'key_method'=>'getId',
                  'query'    => $categoria->getCategoriaSelectFront(),
        ),array('class' => 'form-control'));
      
        
        
       $this->widgetSchema['proveedor_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model'     => 'Proveedor'
      ),array('class' => 'form-control'));
      
      $this->widgetSchema['proveedor_sucursal_id'] = new sfWidgetFormDoctrineDependentSelect(array(
	            'model'     => 'ProveedorSucursal',
                    'depends'   => 'Proveedor',
                    'table_method' => 'getNombre',
                    'add_empty' => 'Todas',
      ));
        
       
      $this->widgetSchema['fecha_limite'] = new sfWidgetFormInputText(array(),array('placeholder'=>'00/00/0000 00:00 AM - 00/00/0000 00:00 AM','class' => 'form-control datetime'));
      
        $this->widgetSchema['precio'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));
      $this->widgetSchema['precio_oferta'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));
      
//Cambiar a lista y su validador de los status Activo e Inativo 0/1
        $this->widgetSchema['comportamiento'] = new sfWidgetFormChoice(array(
           'choices' => ProveedorDescuento::$comportamiento,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
        
        $rango[0] = '0%';
        for($i=1;$i<=100; $i++){
            $rango[$i] = $i.' %';
        }
        $this->widgetSchema['aplicacion'] = new sfWidgetFormChoice(array(
           'choices' => $rango,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
        
        $this->widgetSchema['num_descuentos'] = new sfWidgetFormChoice(array(
           'choices' => $rango,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
        
        $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Ingresar observaciones relacionadas','class' => 'form-control textarea'));
        $this->widgetSchema['condiciones'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Detallar las condiciones para uso','class' => 'form-control textarea'));
       
        
        
        $file_src = 's_'.$this->getObject()->getImagenUno();
        if ($this->getObject()->isNew()||(!$this->getObject()->getImagenUno()))
        {
          $file_src = 'default_image.jpg';
        }
        
        
       $this->widgetSchema['imagen_uno'] = new sfWidgetFormInputFileEditable(array(
            'label' => ' ',
            'file_src' => '/uploads/descuento/'.$file_src,
            'is_image' => true,
            'edit_mode' => true,
            'template' => '<div>%file%<br />%input%</div>',
        ));
        
      //Validacion del campo imagen para poder subir las fotos
      $this->validatorSchema['imagen_uno'] = new sfValidatorFile(array(
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
        
        
       
       
       
  
      //Sucursales 
      $galerias = $this->getObject()->getGaleriaDescuento();
      
      
      if(!count($galerias)) {
          $galerias = array();
      }      
      
      if($this->isNew()){
        
            $precio = new GaleriaDescuento();
            $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
            $precio->setProveedorDescuento($this->getObject());
            array_push ($galerias, $precio);
                        
            
      }
      
      
              
      $galerias_form = new sfForm();
      $count = 0;
      foreach ($galerias as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new GaleriaDescuentoForm($precio);
                $galerias_form->embedForm($count, $precio_form);
                $count++;
                
          }
      }

      $this->embedForm('galerias', $galerias_form);
      // Fin Sucursales
   
       
      
         //Campos 
      $campos = $this->getObject()->getCampoDescuento();
      
      
      if(!count($campos)) {
          $campos = array();
      }      
      
      if($this->isNew()){
        
                   $camposSQ = new Campo();
                   $camposSQ = $camposSQ->getCamposSelect()->execute();
                  
                   foreach ($camposSQ as $campo){
          
                   $precio = new CampoDescuento();
                   $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                   $precio->setProveedorDescuento($this->getObject());
                   $precio->setCampoId($campo->getId());
                   array_push ($campos, $precio);
                   
                   }
            
      }
      
      
      //recorro los valores para ver si falta alguno de los nuevos
      foreach ($campos as $precio) ${'campo'.$precio->getCampoId()} = $precio->getCampoId();
      
      
      $campos_form = new sfForm();
      $count = 0;
      
      $camposSQ = new Campo();
      $camposSQ = $camposSQ->getCamposSelect()->execute();

       foreach ($camposSQ as $campo){

                if(${'campo'.$campo->getId()}<>$campo->getId()){
                        
                $precio = new CampoDescuento();
                $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $precio->setProveedorDescuento($this->getObject());
                $precio->setCampoId($campo->getId());
                $precio->save();
                
                $precio_form = new CampoDescuentoForm($precio);
                $campos_form->embedForm($count, $precio_form);
                $count++;
                
                }
       }
      
      
              
      
      foreach ($campos as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new CampoDescuentoForm($precio);
                $campos_form->embedForm($count, $precio_form);
                $count++;
                
                
                
          }
      }

      $this->embedForm('campos', $campos_form);
      
    
      // Fin Campos
      
      
      
  }
  
  
   public function addGaleria($num) {
      $pre = new GaleriaDescuento();
      $pre->setProveedorDescuento($this->getObject());
      $pre_form = new GaleriaDescuentoForm($pre);

      $this->embeddedForms['galerias']->embedForm($num, $pre_form);

      $this->embedForm('galerias', $this->embeddedForms['galerias']);

  }
  
    public function addCampo($num) {
      $pre = new CampoDescuento();
      $pre->setProveedor($this->getObject());
      $pre_form = new CampoDescuentoForm($pre);

      $this->embeddedForms['campos']->embedForm($num, $pre_form);

      $this->embedForm('campos', $this->embeddedForms['campos']);

  }
  


public function  bind(array $taintedValues = null, array $taintedFiles = null) {
    

    
    foreach ($taintedValues['galerias'] as $key => $newGaleria)
    {
        if(!isset ($this['galerias'][$key])){
            $this->addGaleria($key);
        }
    }
    
    
     foreach ($taintedValues['campos'] as $key => $newCampo)
    {
        if(!isset ($this['campos'][$key])){
            $this->addCampo($key);
        }
    }
    
  
    parent::bind($taintedValues, $taintedFiles);
    }
  
}
