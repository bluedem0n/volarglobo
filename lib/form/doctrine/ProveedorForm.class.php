<?php

/**
 * Proveedor form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProveedorForm extends BaseProveedorForm
{
  public function configure()
  {
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['expires_at']

      );
      

     
     $categoria = new Categoria();
        $this->widgetSchema['categoria_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'Categoria',
                  'key_method'=>'getId',
                  'query'    => $categoria->getCategoriaSelectFront(),
        ),array('class' => 'form-control'));
     

     
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
    $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del proveedor','class' => 'form-control'));
      $this->widgetSchema['rif'] = new sfWidgetFormInputText(array(),array('placeholder'=>'RUC','class' => 'form-control'));
      $this->widgetSchema['dni'] = new sfWidgetFormInputText(array(),array('placeholder'=>'DNI','class' => 'form-control'));
      $this->widgetSchema['website'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Web site','class' => 'form-control'));
      $this->widgetSchema['nickname'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nickname del proveedor','class' => 'form-control'));
      $this->widgetSchema['descripcion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Descripción del proveedor','class' => 'form-control textarea'));
      $this->widgetSchema['horario'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Horario','class' => 'form-control textarea'));
      $this->widgetSchema['direccion_fiscal'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Dirección fiscal del proveedor','class' => 'form-control textarea'));
      $this->widgetSchema['direccion_fisica'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Longitud,latidud','class' => 'form-control'));
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones sobre el proveedor','class' => 'form-control textarea'));
      $this->widgetSchema['telefono1'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Teléfono del proveedor','class' => 'form-control'));
      $this->widgetSchema['telefono2'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Teléfono adicional del proveedor','class' => 'form-control'));
      $this->widgetSchema['email'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Correo','class' => 'form-control'));
      $this->widgetSchema['contacto_nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del contacto del proveedor','class' => 'form-control'));
      $this->widgetSchema['contacto_puesto'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Puesto del contacto del proveedor','class' => 'form-control'));
      
      
      
        $file_src = "s_".$this->getObject()->getLogo();
        if ($this->getObject()->isNew()||(!$this->getObject()->getLogo()))
        {
          $file_src = 'default_image.jpg';
        }
        
        
//          Seteo del campo imagen para poder subir las fotos

        
        $this->widgetSchema['logo'] = new sfWidgetFormInputFileEditable(array(
            'label' => ' ',
            'file_src' => '/uploads/proveedor/'.$file_src,
            'is_image' => true,
            'edit_mode' => true,
            'template' => '<div>%file%<br />%input%</div>',
        ));
        
      //Validacion del campo imagen para poder subir las fotos
      $this->validatorSchema['logo'] = new sfValidatorFile(array(
        'required' => false,
        'path' => 'uploads/proveedor/',
          
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
      
      
      
      $this->widgetSchema['video'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Insert del video','class' => 'form-control'));
      
      
      
        //Cambiar a lista y su validador de los status Activo e Inativo 0/1
        $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
           'choices' => Categoria::$status,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
        
        
        //Cambiar a lista y su validador de los status Activo e Inativo 0/1
        $this->widgetSchema['destacado'] = new sfWidgetFormChoice(array(
           'choices' => Categoria::$status,
           'expanded' => false,
           'multiple' => false

        ),array('class' => 'form-control'));
        
        
        
        $this->widgetSchema['redes_sociales'] = new sfWidgetFormInputHidden(array(),array());
        $this->widgetSchema['palabras_claves'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Separlos por comas(,) ejemplo palabra 1, palabra 2','class' => 'form-control'));
      

     $this->widgetSchema['provincia_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model'     => 'Provincia',
      ),array('class' => 'form-control'));
      
      $this->widgetSchema['ciudad_id'] = new sfWidgetFormDoctrineDependentSelect(array(
	            'model'     => 'Ciudad',
                    'depends'   => 'Provincia',
                    'table_method' => 'getNombre',
                    'add_empty' => 'Seleccione ciudad',
      ));

  
        
        
        
  
  
  
      //Sucursales 
      $sucursales = $this->getObject()->getProveedorSucursal();
      
      
      if(!count($sucursales)) {
          $sucursales = array();
      }      
      
      if($this->isNew()){
        
                   
                       
            $precio = new ProveedorSucursal();
            $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
            $precio->setProveedor($this->getObject());
            array_push ($sucursales, $precio);
                        
            
      }
      
      
              
      $sucursales_form = new sfForm();
      $count = 0;
      foreach ($sucursales as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new ProveedorSucursalForm($precio);
                $sucursales_form->embedForm($count, $precio_form);
                $count++;
                
          }
      }

      $this->embedForm('sucursales', $sucursales_form);
      // Fin Sucursales
   
       
      //Sucursales 
      $galerias = $this->getObject()->getGaleriaProveedor();
      
      
      if(!count($galerias)) {
          $galerias = array();
      }      
      
      if($this->isNew()){
        
            $precio = new GaleriaProveedor();
            $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
            $precio->setProveedor($this->getObject());
            array_push ($galerias, $precio);
                        
            
      }
      
      
              
      $galerias_form = new sfForm();
      $count = 0;
      foreach ($galerias as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new GaleriaProveedorForm($precio);
                $galerias_form->embedForm($count, $precio_form);
                $count++;
                
          }
      }

      $this->embedForm('galerias', $galerias_form);
      // Fin Sucursales
      
      
      
      
        //Redes 
      $redes = $this->getObject()->getProveedorRede();
      
      
      if(!count($redes)) {
          $redes = array();
      }      
      
      if($this->isNew()){
        
                   $redesSQ = new Rede();
                   $redesSQ = $redesSQ->getRedesSelect()->execute();
                  
                   foreach ($redesSQ as $red){
          
                   $precio = new ProveedorRede();
                   $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                   $precio->setProveedor($this->getObject());
                   $precio->setRedeId($red->getId());
                   array_push ($redes, $precio);
                   
                   }
            
      }
      
      
      //recorro los valores para ver si falta alguno de los nuevos
      foreach ($redes as $precio) ${'red'.$precio->getRedeId()} = $precio->getRedeId();
      
      
      $redes_form = new sfForm();
      $count = 0;
      
      $redesSQ = new Rede();
      $redesSQ = $redesSQ->getRedesSelect()->execute();

       foreach ($redesSQ as $red){

                if(${'red'.$red->getId()}<>$red->getId()){
                        
                $precio = new ProveedorRede();
                $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $precio->setProveedor($this->getObject());
                $precio->setRedeId($red->getId());
                $precio->save();
                
                $precio_form = new ProveedorRedeForm($precio);
                $redes_form->embedForm($count, $precio_form);
                $count++;
                
                }
       }
      
      
              
      
      foreach ($redes as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new ProveedorRedeForm($precio);
                $redes_form->embedForm($count, $precio_form);
                $count++;
                
                
                
          }
      }

      $this->embedForm('redes', $redes_form);
      
    
      // Fin Redes
   
      
      
         //Pagos 
      $pagos = $this->getObject()->getProveedorPago();
      
      
      if(!count($pagos)) {
          $pagos = array();
      }      
      
      if($this->isNew()){
        
                   $pagosSQ = new Pago();
                   $pagosSQ = $pagosSQ->getPagosSelect()->execute();
                  
                   foreach ($pagosSQ as $red){
          
                   $precio = new ProveedorPago();
                   $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                   $precio->setProveedor($this->getObject());
                   $precio->setPagoId($red->getId());
                   array_push ($pagos, $precio);
                   
                   }
            
      }
      
      
      //recorro los valores para ver si falta alguno de los nuevos
      foreach ($pagos as $precio) ${'pag'.$precio->getPagoId()} = $precio->getPagoId();
      
      
      $pagos_form = new sfForm();
      $count = 0;
      
      $pagosSQ = new Pago();
      $pagosSQ = $pagosSQ->getPagosSelect()->execute();

       foreach ($pagosSQ as $red){

                if(${'pag'.$red->getId()}<>$red->getId()){
                        
                $precio = new ProveedorPago();
                $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $precio->setProveedor($this->getObject());
                $precio->setPagoId($red->getId());
                $precio->setValor('');
                $precio->save();
                
                $precio_form = new ProveedorPagoForm($precio);
                $pagos_form->embedForm($count, $precio_form);
                $count++;
                
               }
       }
      

      
      foreach ($pagos as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new ProveedorPagoForm($precio);
                $pagos_form->embedForm($count, $precio_form);
                $count++;
                
                
                
          }
      }

      $this->embedForm('pagos', $pagos_form);
      
    
      // Fin Pagos
   
     
     
      
 
      

  }
  
   public function addGaleria($num) {
      $pre = new GaleriaProveedor();
      $pre->setProveedor($this->getObject());
      $pre_form = new GaleriaProveedorForm($pre);

      $this->embeddedForms['galerias']->embedForm($num, $pre_form);

      $this->embedForm('galerias', $this->embeddedForms['galerias']);

  }
    
 
  
  public function addSucursal($num) {
      $pre = new ProveedorSucursal();
      $pre->setProveedor($this->getObject());
      $pre_form = new ProveedorSucursalForm($pre);

      $this->embeddedForms['sucursales']->embedForm($num, $pre_form);

      $this->embedForm('sucursales', $this->embeddedForms['sucursales']);

  }
  

  
  public function addPago($num) {
      $pre = new ProveedorPago();
      $pre->setProveedor($this->getObject());
      $pre_form = new ProveedorPagoForm($pre);

      $this->embeddedForms['pagos']->embedForm($num, $pre_form);

      $this->embedForm('pagos', $this->embeddedForms['pagos']);

  }
  
    
  public function addRede($num) {
      $pre = new ProveedorRede();
      $pre->setProveedor($this->getObject());
      $pre_form = new ProveedorRedeForm($pre);

      $this->embeddedForms['redes']->embedForm($num, $pre_form);

      $this->embedForm('redes', $this->embeddedForms['redes']);

  }
  



public function  bind(array $taintedValues = null, array $taintedFiles = null) {
    

    
    foreach ($taintedValues['sucursales'] as $key => $newSucursal)
    {
        if(!isset ($this['sucursales'][$key])){
            $this->addSucursal($key);
        }
    }
    
    
    foreach ($taintedValues['redes'] as $key => $newRede)
    {
        if(!isset ($this['redes'][$key])){
            $this->addRede($key);
        }
    }
    
    foreach ($taintedValues['pagos'] as $key => $newPago)
    {
        if(!isset ($this['pagos'][$key])){
            $this->addPago($key);
        }
    }

    
    foreach ($taintedValues['galerias'] as $key => $newGaleria)
    {
        if(!isset ($this['galerias'][$key])){
            $this->addGaleria($key);
        }
    }
    
  
    

    parent::bind($taintedValues, $taintedFiles);
    }
  
    
    
    
}
